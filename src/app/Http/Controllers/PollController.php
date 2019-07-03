<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Answer;
use App\Poll;
use App\Vote;
use Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use RelativeTime\RelativeTime;

class PollController extends Controller
{
    public function index()
    {
        return view('poll.index', ['polls' => Poll::all()]);
    }

    public function show(String $slug)
    {
        /** @var Poll $poll */
        $poll = Poll::where('slug', $slug)->firstOrFail();

        $remainingTime = $this->getRemainingTime($poll);

        if ($this->canVote($poll)) {
            return view('poll.vote', ['poll' => $poll, 'remainingTime' => $remainingTime]);
        }

        $answers = $poll->answers()->orderByDesc('score')->get();

        return view('poll.result', ['poll' => $poll, 'answers' => $answers, 'remainingTime' => $remainingTime]);
    }

    private function getRemainingTime(Poll $poll): ?string
    {
        if ($poll->isExpired()) {
            return null;
        }

        $relativeTime = new RelativeTime(['language' => '\RelativeTime\Languages\French']);
        return $poll->expiration === null ? null : $relativeTime->timeLeft($poll->expiration);
    }

    private function canVote(Poll $poll): bool
    {
        return !$this->hasVoted($poll) && !$poll->isExpired();
    }

    private function hasVoted(Poll $poll): bool
    {
        return Vote::where('user_id', Auth::id())->count() > 0;
    }

    public function vote(String $slug)
    {
        $poll = Poll::where('slug', $slug)->first();

        if (!isset($_POST['vote'])) {
            return redirect(route('poll.show', $poll->slug));
        }

        if (!$this->canVote($poll)) {
            return redirect(route('poll.show', $poll->slug));
        }

        $answer = Answer::find((int)$_POST['vote']);
        if (is_null($answer)) {
            return redirect(route('poll.show', $poll->slug));
        }

        $vote = new Vote();
        $vote->user_id = Auth::id();
        $vote->answer_id = $answer->id;
        $vote->save();

        $answer->score++;
        $answer->save();

        return redirect(route('poll.show', $poll->slug));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('poll.edit');
        }

        if (empty($_POST['title'])) {
            dd('todo: flash messge');
        }

        $poll = new Poll();
        $poll->title = $_POST['title'];
        $poll->event_id = 0;
        if (!empty($_POST['text'])) $poll->text = $_POST['text'];
        if (!empty($_POST['slug'])) $poll->slug = $_POST['slug'];

        if (!empty($_POST['expiration-date'])) {
            $expiration = $_POST['expiration-date'];
            $format = 'Y-m-d';

            if (!empty($_POST['expiration-time'])) {
                $expiration .= ' ' . $_POST['expiration-time'];
                $format .= ' H:i';
            }

            $poll->expiration = date_create_from_format($format, $expiration);
        }

        try {
            $poll->save();
        } catch (QueryException $exception) {
            if ($exception->errorInfo[1] == 1062){
                die('todo: flash messge (Duplicated uniq entry, check if slug)');
            }
        }



        if (empty($_POST['answers'])) {
            return redirect(route('poll.show', $poll->slug));
        }

        $answers = explode("\r\n", $_POST['answers']); // not unix users ?

        foreach ($answers as $answerText) {
            $answer = new Answer();
            $answer->poll_id = $poll->id;
            $answer->text = $answerText;
            $answer->save();
        }

        return redirect(route('poll.show', $poll->slug));


        \DB::table('polls')->truncate();
        \DB::table('answers')->truncate();
        \DB::table('votes')->truncate();

        $poll = new Poll();
        $poll->event_id = 0;
        $poll->title = "Vous voulez manger des pommes ?";
        $poll->text = "W?";
        $poll->expiration = date_create_from_format("U", "1562174696");
//        $poll->expiration = now();
        $poll->save();

        $answer1 = new Answer();
        $answer1->poll_id = $poll->id;
        $answer1->text = "Oui";
        $answer1->save();

        $answer2 = new Answer();
        $answer2->poll_id = $poll->id;
        $answer2->text = "Non";
        $answer2->save();

        $vote = new Vote();
        $vote->user_id = 0;
        $vote->answer_id = $answer2->id;
        $vote->save();

        $vote = new Vote();
        $vote->user_id = 0;
        $vote->answer_id = $answer2->id;
        $vote->save();

        $vote = new Vote();
        $vote->user_id = 0;
        $vote->answer_id = $answer1->id;
        $vote->save();
    }
}

<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Answer;
use App\Event;
use App\Poll;
use App\Vote;
use Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function index()
    {
        return view('poll.index', ['polls' => Poll::all()]);
    }

    public function show(Event $event, String $slug)
    {
        /** @var Poll $poll */
        $poll = Poll::where('slug', $slug)->firstOrFail();

        if ($this->canVote($poll)) {
            return view('poll.vote', ['event' => $event, 'poll' => $poll, 'remainingTime' => $poll->remainingTime()]);
        }

        $answers = $poll->answers()->orderByDesc('score')->get();
        $userVotes = $this->getUserVotes($poll);

        return view('poll.result', ['event' => $event, 'poll' => $poll, 'answers' => $answers, 'userVotes' => $userVotes, 'remainingTime' => $poll->remainingTime()]);
    }

    private function canVote(Poll $poll): bool
    {
        return !$this->hasVoted($poll) && !$poll->isExpired();
    }

    private function hasVoted(Poll $poll): bool
    {
        return $this->getUserVotes($poll) !== [];
    }

    private function getUserVotes(Poll $poll): array
    {
        $votes = [];
        $poll->answers()->each(function (Answer $a) use (&$votes) {
            if (!empty($a->votes()->get()->toArray())) {
                $votes[] = $a->id;
            }
        });

        return $votes;
    }

    public function vote(Event $event, String $slug)
    {
        $poll = Poll::where('slug', $slug)->first();

        if (!isset($_POST['vote'])) {
            return redirect(route('poll.show', [$event, $poll->slug]));
        }

        if (!$this->canVote($poll)) {
            return redirect(route('poll.show', [$event, $poll->slug]));
        }

        $answer = Answer::find((int)$_POST['vote']);
        if (is_null($answer)) {
            return redirect(route('poll.show', [$event, $poll->slug]));
        }

        $vote = new Vote();
        $vote->user_id = Auth::id();
        $vote->answer_id = $answer->id;
        $vote->save();

        $answer->score++;
        $answer->save();

        return redirect(route('poll.show', [$event, $poll->slug]));
    }

    public function create(Request $request, Event $event)
    {
        if ($request->isMethod('get')) {
            return view('poll.edit');
        }

        if (empty($_POST['title'])) {
            dd('todo: flash messge');
        }

        $poll = new Poll();
        $poll->title = $_POST['title'];
        $poll->event_id = $event->id;
        if (!empty($_POST['text'])) {
            $poll->text = $_POST['text'];
        }
        if (!empty($_POST['slug'])) {
            $poll->slug = $_POST['slug'];
        }

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
            if ($exception->errorInfo[1] == 1062) {
                die('todo: flash messge (Duplicated uniq entry, check if slug)');
            }
        }


        if (empty($_POST['answers'])) {
            return redirect(route('poll.show', [$event, $poll->slug]));
        }

        $answers = explode("\r\n", $_POST['answers']); // not unix users ?

        foreach ($answers as $answerText) {
            $answer = new Answer();
            $answer->poll_id = $poll->id;
            $answer->text = $answerText;
            $answer->save();
        }

        return redirect(route('event.detail', $event));
    }
}

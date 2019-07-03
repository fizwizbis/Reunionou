<form method="POST">
    @csrf

    <label for="title">Titre du sondage</label>
    <br>
    <input required id="title" type="text" name="title" value="{{ isset($title) ? $title : '' }}">
    <br><br>

    <label for="slug">slug</label>
    <br>
    <input id="slug" type="text" name="slug" value="{{ isset($slug) ? $slug : '' }}">
    <br><br>

    <label for="text">Description</label>
    <br>
    <textarea name="text" id="text" cols="30" rows="5">{{ isset($text) ? $text : '' }}</textarea>
    <br><br>

    <label for="expiration-date">Expiration</label>
    <br>
    <input id="expiration-date" type="date" name="expiration-date" value="{{ isset($expirationDate) ? $expirationDate : '' }}">
    <input id="expiration-time" type="time" name="expiration-time" value="{{ isset($expirationTime) ? $expirationTime : '' }}">
    <br><br>

    <label for="answers">Réponses</label>
    <br>
    <textarea name="answers" id="answers" cols="30" rows="5">{{ isset($answers) ? $answers : '' }}</textarea>
    <br><br>

    <input type="submit">
</form>

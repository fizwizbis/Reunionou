<form method="POST">
    @csrf

    <label for="name">Nom de la liste</label>
    <input id="name" type="text" name="name" value="{{ isset($name) ? $name : '' }}">

    <input type="submit">
</form>

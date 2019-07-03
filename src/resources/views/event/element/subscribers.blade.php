<div class="columns" id="subscribers">
    @for($i = 0; $i < $size; $i++)

        <div class="column" style="border: 1px solid red">
            <img src="#">
        </div>

    @endfor
</div>

<script>
    let bigBox = document.getElementById("subscribers");
    let children = bigBox.querySelectorAll(".column");
    let sizeBigBox = myElement.width;
    let sizeLittleBox = sizeBigBox / children.length;
    children.forEach(function () {
        this.width = sizeLittleBox;
    });
</script>

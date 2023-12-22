<div class="grid">
    <?php
    foreach (scandir(__DIR__ . '/../dist/') as $example) {
        if ($example[0] === '.') continue;
        ?>
        <div>
            <iframe src="dist/<?= $example ?>"></iframe>
            <a href='dist/<?= $example ?>'><?= trim(str_replace('-', ' ', substr($example, 0, -5)), '0123456789 ') ?></a>
        </div>
        <?php
    }
    ?>
</div>
<style>
* {
    font-family: sans-serif;
    box-sizing: border-box;
}
body {
    background-color: cadetblue;
}
.grid {
    display: grid;
    grid-template-columns: 25% calc(25% - 1rem) calc(25% - 1rem) 25%;
    grid-gap: 1rem;
    width: calc(100vw - 2rem);
}

.grid > div {
    height: 475px;
    background-color: #eee;
    text-align: center;
    overflow:hidden;
    text-transform: capitalize;
    line-height: 1.75rem;
    font-size: 1rem;
    outline: solid 1px #ddd;
}
.grid > div > iframe {
    background-color: white;
    height: calc(475px - 1.75rem);
    width: 100%;
    border: none;
}
</style>
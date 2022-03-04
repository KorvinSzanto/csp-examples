<div class="grid">
    <?php
    foreach (scandir(__DIR__ . '/../dist/') as $example) {
        if ($example[0] === '.') continue;
        ?>
        <div>
            <iframe src="/dist/<?= $example ?>"></iframe>
            <a href='/dist/<?= $example ?>'><?= trim(str_replace('-', ' ', substr($example, 0, -5)), '0123456789 ') ?></a>
        </div>
        <?php
    }
    ?>
</div>
<style>
* {
    font-family: sans-serif;
}

.grid > div {
    display: inline-block;
    width: 350px;
    height: 400px;
    background-color: #eee;
    border: solid 1px #aaa;
    text-align: center;
    overflow:hidden;
    margin: .5rem;
    text-transform: capitalize;
    line-height: 1.75rem;
    font-size: 1rem;
}
.grid > div > iframe {
    background-color: white;
    height: calc(400px - 1.75rem);
    width: 100%;
    border: none;
}
</style>
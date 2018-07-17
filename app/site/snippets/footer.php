        <div class="cf"></div>

        <div class="wrap-fluid">
            <div class="h1">
                <?= $site->footer()->kirbytext() ?>
            </div>
        </div>

        <div class="cf"></div>

        <div class="footer" role="contentinfo">
            <div class="wrap-fluid">
                <?= $site->copyright()->kirbytext()?>
                <div class="cf"></div>
            </div>
        </div>

    </div><!-- #container -->
</div><!-- #canvas -->

<?= js('assets/scripts/vendor/d3.min.js') ?>
<?= js('assets/scripts/vendor/search.js') ?>

<?= js('assets/scripts/vendor/animsition.min.js') ?>
<?= js('assets/scripts/main.js') ?>


</body>
</html>

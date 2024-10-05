<!-- load vue script -->
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<!-- add script to mount vue app at the end of the body -->
<?php
$this->registerJsFile('@web/js/vue-widget.js', ['position' => \yii\web\View::POS_END]);
?>

<div>
  <p>This is a Vue app embedded in a Yii project</p>
  <div id="vue-widget">
     {{message}}
  </div>
</div>
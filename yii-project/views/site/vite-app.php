<?php
$USE_BUILD = false;
$manifestPath = Yii::getAlias('js/vite-widget/.vite/manifest.json');
$manifest = [];

if (file_exists($manifestPath)) {
    $manifest = json_decode(file_get_contents($manifestPath), true);
}

$entry = reset($manifest);
?>

<div>Hello from Yii Vite App Page</div>
<div id="vue-app"></div>
<?php if (YII_ENV_DEV && !$USE_BUILD): ?>
  <!-- if development -->
   <!-- this needs the vite dev server running, i.e. (cd app && bun run dev) -->
  <script type="module" src="http://localhost:3000/@vite/client"></script>
  <script type="module" src="http://localhost:3000/src/main.ts"></script>
<?php else: ?>
  <!-- if production -->
   <!-- this requires running the build command, i.e. (cd app && bun run build) -->
  <!-- CSS for the entry point -->
  <?php if (isset($entry['css'])): ?>
    <?php foreach ($entry['css'] as $cssFile): ?>
      <link rel="stylesheet" href="/js/vite-widget/<?= $cssFile ?>" />
    <?php endforeach; ?>
  <?php endif; ?>

  <!-- Main script file -->
  <?php if (isset($entry['file'])): ?>
    <script type="module" src="/js/vite-widget/<?= $entry['file'] ?>"></script>
  <?php endif; ?>
<?php endif; ?>

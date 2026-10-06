<?php
$_display_meta = $_display_meta ?? true;
$meta_title = $meta_title ?? null;
$meta_keywords = $meta_keywords ?? null;
$meta_desc = $meta_desc ?? null;
$robot = $robot ?? 'index,follow';
$canonical = $canonical ?? null;
$title = $title ?? null;
$image = $image ?? null;

if ($_display_meta) {
    if (!empty($meta_title)) {
        echo '<title>' . h($meta_title) . '</title>' . "\n";
    } elseif (!empty($title)) {
        echo '<title>' . h($title) . ' - Agshov Pharmaceuticals</title>' . "\n";
    } else {
        echo '<title>Agshov Pharmaceuticals</title>' . "\n";
    }

    if (!empty($meta_keywords)) {
        echo '<meta name="keywords" content="' . h($meta_keywords) . '" />' . "\n";
    }
    if (!empty($meta_desc)) {
        echo '<meta name="description" content="' . h($meta_desc) . '" />' . "\n";
    }
    if (!empty($robot)) {
        echo '<meta name="robots" content="' . h(rtrim($robot, ',')) . '" />' . "\n";
    }
    if (!empty($canonical)) {
        echo '<link rel="canonical" href="' . h(str_replace('http://', 'https://', $canonical)) . '" />' . "\n";
    }

    echo '<meta property="og:title" content="' . h($title ?: $meta_title ?: 'Agshov Pharmaceuticals') . '">' . "\n";
    if (!empty($meta_desc)) {
        echo '<meta property="og:description" content="' . h($meta_desc) . '">' . "\n";
    }
    if (!empty($image)) {
        echo '<meta property="og:image" content="' . h($image) . '">' . "\n";
    }
    if (!empty($canonical)) {
        echo '<meta property="og:url" content="' . h($canonical) . '">' . "\n";
    }
} else {
    echo '<title>Agshov Pharmaceuticals</title>' . "\n";
}
?>

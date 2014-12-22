<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since Release 1.0
* @category     pagination
*/

    // total page count calculation
    $pages = ((int) ceil($total / $rpp));

    // if it's an invalid page request
    if ($current < 1) {
        return;
    } elseif ($current > $pages) {
        return;
    }

    // if there are pages to be shown
    if ($pages > 1) {
?>
<div class="<?php echo implode(' ', $classes) ?>">
    <ul class="clear">
<?php
        $classes = array('copy', 'previous');
        $params = $get;
        $params[$key] = ($current - 1);
        $href = ($target) . '?' . http_build_query($params);
        if ($current === 1) {
            $href = '#';
            array_push($classes, 'disabled');
        }
?>
        <li class="<?php echo implode(' ', $classes) ?>"><a href="<?php echo ($href) ?>"><?php echo ($previous) ?></a></li>
<?php
        if (!$clean) {

            $max = min($pages, $crumbs);
            $limit = ((int) floor($max / 2));
            $leading = $limit;
            for ($x = 0; $x < $limit; ++$x) {
                if ($current === ($x + 1)) {
                    $leading = $x;
                    break;
                }
            }
            for ($x = $pages - $limit; $x < $pages; ++$x) {
                if ($current === ($x + 1)) {
                    $leading = $max - ($pages - $x);
                    break;
                }
            }

            $trailing = $max - $leading - 1;

            for ($x = 0; $x < $leading; ++$x) {

                $params = $get;
                $params[$key] = ($current + $x - $leading);
                $href = ($target) . '?' . http_build_query($params);
?>
        <li class="number"><a href="<?php echo ($href) ?>"><?php echo ($current + $x - $leading) ?></a></li>
<?php
            }

?>
        <li class="number active"><a href="#"><?php echo ($current) ?></a></li>
<?php
            for ($x = 0; $x < $trailing; ++$x) {

                $params = $get;
                $params[$key] = ($current + $x + 1);
                $href = ($target) . '?' . http_build_query($params);
?>
        <li class="number"><a href="<?php echo ($href) ?>"><?php echo ($current + $x + 1) ?></a></li>
<?php
            }
        }

        $classes = array('copy', 'next');
        $params = $get;
        $params[$key] = ($current + 1);
        $href = ($target) . '?' . http_build_query($params);
        if ($current === $pages) {
            $href = '#';
            array_push($classes, 'disabled');
        }
?>
        <li class="<?php echo implode(' ', $classes) ?>"><a href="<?php echo ($href) ?>"><?php echo ($next) ?></a></li>
    </ul>
</div>
<?php
    }

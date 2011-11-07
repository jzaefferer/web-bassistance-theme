<?php
function popular_tags($smallest=10, $largest=48, $unit="pt", $exclude='', $num_to_show=10)
{
        $cats = list_cats(1, 'all', 'name', 'asc', '', 0, 0, 1, 1, 0, 1, 1, 0, 1, '', '', $exclude, 0);
        
        $myurl = get_bloginfo('url');
        $category_base = get_settings('category_base');
        $displaynum=$num_to_show;
        $cats = explode("\n", $cats);
        foreach ($cats as $cat)
        {
                eregi("a href=\"(.+)\" ", $cat, $regs);
                $catlink = $regs[1];
                $cat = trim(strip_tags($cat));
                eregi("(.*) \(([0-9]+)\)$", $cat, $regs);
                $catname = $regs[1]; $count = $regs[2];
                $counts{$catname} = $count;
                $catlinks{$catname} = $catlink;
        }
        natsort($counts);
        $num=sizeof($counts);
        foreach($counts as $catname => $count) {
                // Let's shrink the array to match $displaynum
                if ($num > $displaynum) {
                        array_shift($counts);
                } else {
                        break;
                }
                $num--;
        }

        ksort($counts);
        $spread = max($counts) - min($counts);
        if ($spread <= 0) { $spread = 1; };
        $fontspread = $largest - $smallest;
        $fontstep = $spread / $fontspread;
        if ($fontspread <= 0) { $fontspread = 1; }

        foreach ($counts as $catname => $count)
        {
                $catlink = $catlinks{$catname};
                if (strstr($catlink, "http:") == FALSE) {
                        print "<li><a href=\"$myurl$category_base/$catlink\" rel=\"tag\" title=\"$count entries\" style=\"font-size: ".
                        ($smallest + ($count/$fontstep))."$unit;\">$catname</a></li>";
                } else {
                        print "<li><a href=\"$catlink\" rel=\"tag\" title=\"$count entries\" style=\"font-size: ".
                        ($smallest + ($count/$fontstep))."$unit;\">$catname</a></li>";
                }
        }
}
?>

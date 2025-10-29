<ul class="menuverse">
{foreach $menuverse_menu as $item}
    <li class="menuverse-item">
        <a href="{$item.link}" class="menuverse-link">
            <span class="menuverse-title">{$item.title}</span>
            {if $item.subtitle}<span class="menuverse-subtitle">{$item.subtitle}</span>{/if}
        </a>

        {if isset($item.children) && $item.children|count}
        <ul class="menuverse-submenu">
            {foreach $item.children as $child}
                <li>
                    <a href="{$child.link}">
                        <span class="menuverse-title">{$child.title}</span>
                        {if $child.subtitle}<span class="menuverse-subtitle">{$child.subtitle}</span>{/if}
                    </a>

                    {if isset($child.children) && $child.children|count}
                    <ul class="menuverse-submenu">
                        {foreach $child.children as $subchild}
                            <li>
                                <a href="{$subchild.link}">
                                    <span class="menuverse-title">{$subchild.title}</span>
                                </a>
                            </li>
                        {/foreach}
                    </ul>
                    {/if}
                </li>
            {/foreach}
        </ul>
        {/if}
    </li>
{/foreach}
</ul>

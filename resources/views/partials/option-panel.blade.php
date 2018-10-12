<div id="switch">
    <div class="content-switcher">
        <p class="brand-text">Color Options:</p>
        <ul class="header">
            <li><a href="#" onclick="setActiveStyleSheet('color1'); return false;" class="button color switch" style="background-color:#00bcd4"></a></li>
            <li><a href="#" onclick="setActiveStyleSheet('color2'); return false;" class="button color switch" style="background-color:#ff4081"></a></li>
            <li><a href="#" onclick="setActiveStyleSheet('color3'); return false;" class="button color switch" style="background-color:#C043D5"></a></li>
            <li><a href="#" onclick="setActiveStyleSheet('color4'); return false;" class="button color switch" style="background-color:#73D077"></a></li>
            <li><a href="#" onclick="setActiveStyleSheet('color5'); return false;" class="button color switch" style="background-color:#FE7448"></a></li>
            <li><a href="#" onclick="setActiveStyleSheet('color6'); return false;" class="button color switch" style="background-color:#1ABBAC"></a></li>
            <li><a href="#" onclick="setActiveStyleSheet('color7'); return false;" class="button color switch" style="background-color:#EAB82E"></a></li>
            <li><a href="#" onclick="setActiveStyleSheet('color8'); return false;" class="button color switch" style="background-color:#799CAC"></a></li>
        </ul>
        <p class="brand-text">Menu Options:</p>
        <div class="menu-select" title="The menu will display in all devices">
            <input type="radio" id="menu1" name="intelligent-menu">
            <label for="menu1">Fixed</label>
        </div>
        <div class="menu-select" title="The menu will display or hide in all devices depending on scroll">
            <input type="radio" id="menu2" name="intelligent-menu" checked="checked">
            <label for="menu2">Intelligent ( Auto Hide )</label>
        </div>
        <div class="menu-select" title="Fixed menu will apply in non-mobile devices and Intelligent menu will apply in mobile devices">
            <input type="radio" id="menu3" name="intelligent-menu">
            <label for="menu3">Mobile Intelligent</label>
        </div>
        <div id="hide">
            <i class="fa fa-times"></i>
        </div>
    </div>
</div>
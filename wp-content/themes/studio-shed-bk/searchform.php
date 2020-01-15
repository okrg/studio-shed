<form role="form" class="brow" action="<?php bloginfo('siteurl'); ?>" _lpchecked="1" id="searchform" name="searchFormDesign" method="get">

    <div class="form-group text-right">
        <input class="form-control input-lg" id="inputlg" type="text" placeholder="brochure" onblur="getoutFnc( this );" onfocus="focusFnc( this );"/>
        <label for="inputlg">Type anything and press enter to search.</label>
    </div>
    <button type="submit" class="sr-only" value="Search">Submit</button>
</form>
<p style="margin-bottom:10px">
    <label for="<?php echo $this->get_field_id( 'title' ); ?>" style="font-weight:bold"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p style="margin-bottom:10px">
<label for="<?php echo $this->get_field_id( 'heading' ); ?>" style="font-weight:bold"><?php _e( 'Select Heading Tag' ); ?></label><br>
    <select name="<?php echo $this->get_field_name( 'heading' ); ?>" id="<?php echo $this->get_field_id( 'heading' ); ?>">
<?php
    $i = 0;
    $headings = array("h1","h2","h3","h4","h5","h6");
    foreach($headings as $head){ ?>
       <option value="<?php echo $head?>" <?php echo ($heading == $head) ? 'selected' : ''; ?>><?php echo $head?></option>
    <?php $i++; } ?>
    </select>
</p>
<p style="margin-bottom:10px">
<label for="<?php echo $this->get_field_id( 'selectedmenu' ); ?>" style="font-weight:bold"><?php _e( 'Select Menu' ); ?></label><br>
    <select name="<?php echo $this->get_field_name( 'selectedmenu' ); ?>" id="<?php echo $this->get_field_id( 'selectedmenu' ); ?>">
<?php
    $menus = get_terms('nav_menu');
    if(sizeof($menus))
    foreach($menus as $menu){ ?>
       <option value="<?php echo $menu->term_id?>" <?php echo ($selectedmenu == $menu->term_id) ? 'selected' : ''; ?>><?php echo $menu->name?></option>
    <?php }
    else
        echo '<option value="">Create menu first</option>'
?>
    </select>
</p>
<p style="margin-bottom:10px">
    <label for="<?php echo $this->get_field_id( 'fontcolor' ); ?>" style="font-weight:bold"><?php _e( 'Font Colour:' ); ?></label><br>
    <input type="text" name="<?php echo $this->get_field_name( 'fontcolor' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'fontcolor' ); ?>" value="<?php echo $fontcolor; ?>" data-default-color="#fff" />
</p>
<p style="margin-bottom:10px">
    <label for="<?php echo $this->get_field_id( 'fonthovercolor' ); ?>" style="font-weight:bold"><?php _e( 'Font Hover Colour:' ); ?></label><br>
    <input type="text" name="<?php echo $this->get_field_name( 'fonthovercolor' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'fonthovercolor' ); ?>" value="<?php echo $fonthovercolor; ?>" data-default-color="#f00" />
</p>
<p style="margin-bottom:10px">
    <label for="<?php echo $this->get_field_id( 'bgcolor' ); ?>" style="font-weight:bold"><?php _e( 'Background Colour:' ); ?></label><br>
    <input type="text" name="<?php echo $this->get_field_name( 'bgcolor' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'fonthovercolor' ); ?>" value="<?php echo $bgcolor; ?>" data-default-color="#f00" />
</p>
<p style="margin-bottom:10px">
    <label for="<?php echo $this->get_field_id( 'bgcolorhover' ); ?>" style="font-weight:bold"><?php _e( 'Background Hover Colour:' ); ?></label><br>
    <input type="text" name="<?php echo $this->get_field_name( 'bgcolorhover' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'bgcolorhover' ); ?>" value="<?php echo $bgcolorhover; ?>" data-default-color="#f00" />
</p>
<p style="margin-bottom:10px">
    <label for="<?php echo $this->get_field_id( 'borderwidth' ); ?>" style="font-weight:bold"><?php _e( 'Border Width:' ); ?></label><br>
    <input class="widefat" style="width: 60px;" id="<?php echo $this->get_field_id( 'borderwidth' ); ?>" name="<?php echo $this->get_field_name( 'borderwidth' ); ?>" type="text" value="<?php echo esc_attr( $borderwidth ); ?>" /> PX
</p>
<p style="margin-bottom:10px">
    <label for="<?php echo $this->get_field_id( 'bordercolor' ); ?>" style="font-weight:bold"><?php _e( 'Border Colour:' ); ?></label><br>
    <input type="text" name="<?php echo $this->get_field_name( 'bordercolor' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'bordercolor' ); ?>" value="<?php echo $bordercolor; ?>" data-default-color="#f00" />
</p>
<p style="margin-bottom:10px">
    <label for="<?php echo $this->get_field_id( 'borderadius' ); ?>" style="font-weight:bold"><?php _e( 'Border Radius:' ); ?></label><br>
    <input class="widefat"  style="width: 60px;" id="<?php echo $this->get_field_id( 'borderadius' ); ?>" name="<?php echo $this->get_field_name( 'borderadius' ); ?>" type="text" value="<?php echo esc_attr( $borderadius ); ?>" /> PX
</p>
<p style="margin-bottom:10px">
    <label for="<?php echo $this->get_field_id( 'menuwidth' ); ?>" style="font-weight:bold"><?php _e( 'Width: (pixel or % example 50% or 200px)' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'menuwidth' ); ?>" name="<?php echo $this->get_field_name( 'menuwidth' ); ?>" type="text" value="<?php echo esc_attr( $menuwidth ); ?>"  placeholder="Default 100%"/>
</p>
<p style="margin-bottom:10px">
    <label for="<?php echo $this->get_field_id( 'margintop' ); ?>" style="font-weight:bold"><?php _e( 'Margin: (in pixels)' ); ?></label><br>
    Top: <input class="widefat" style="width: 60px;" id="<?php echo $this->get_field_id( 'margintop' ); ?>" name="<?php echo $this->get_field_name( 'margintop' ); ?>" type="text" value="<?php echo esc_attr( $margintop ); ?>" />
    Left: <input class="widefat" style="width: 60px;" id="<?php echo $this->get_field_id( 'marginleft' ); ?>" name="<?php echo $this->get_field_name( 'marginleft' ); ?>" type="text" value="<?php echo esc_attr( $marginleft ); ?>" />
    Right: <input class="widefat" style="width: 60px;" id="<?php echo $this->get_field_id( 'marginright' ); ?>" name="<?php echo $this->get_field_name( 'marginright' ); ?>" type="text" value="<?php echo esc_attr( $marginright ); ?>" />
    Bottom: <input class="widefat" style="width: 60px;" id="<?php echo $this->get_field_id( 'marginbottom' ); ?>" name="<?php echo $this->get_field_name( 'marginbottom' ); ?>" type="text" value="<?php echo esc_attr( $marginbottom ); ?>" />
</p>
<p style="margin-bottom:10px">
    <label for="<?php echo $this->get_field_id( 'paddingtop' ); ?>" style="font-weight:bold"><?php _e( 'Padding: (in pixels)' ); ?></label><br>
    Top: <input class="widefat" style="width: 60px;" id="<?php echo $this->get_field_id( 'paddingtop' ); ?>" name="<?php echo $this->get_field_name( 'paddingtop' ); ?>" type="text" value="<?php echo esc_attr( $paddingtop ); ?>" />
    Left: <input class="widefat" style="width: 60px;" id="<?php echo $this->get_field_id( 'paddingleft' ); ?>" name="<?php echo $this->get_field_name( 'paddingleft' ); ?>" type="text" value="<?php echo esc_attr( $paddingleft ); ?>" />
    Right: <input class="widefat" style="width: 60px;" id="<?php echo $this->get_field_id( 'paddingright' ); ?>" name="<?php echo $this->get_field_name( 'paddingright' ); ?>" type="text" value="<?php echo esc_attr( $paddingright ); ?>" />
    Bottom: <input class="widefat" style="width: 60px;" id="<?php echo $this->get_field_id( 'paddingbottom' ); ?>" name="<?php echo $this->get_field_name( 'paddingbottom' ); ?>" type="text" value="<?php echo esc_attr( $paddingbottom ); ?>" />
</p>
<p style="margin-bottom:10px">
    <label for="<?php echo $this->get_field_id( 'iconfontawsm' ); ?>" style="font-weight:bold"><?php _e( 'Icon (Fontawesome)' ); ?></label>
    <input class="widefat awesomiconpicker" id="<?php echo $this->get_field_id( 'iconfontawsm' ); ?>" name="<?php echo $this->get_field_name( 'iconfontawsm' ); ?>" type="text" value="<?php echo esc_attr( $iconfontawsm ); ?>"/>
</p>
<p style="margin-bottom:10px">
    <label for="<?php echo $this->get_field_id( 'iconalignment' ); ?>" style="font-weight:bold"><?php _e( 'Icon Alignment' ); ?></label><br>
    <select name="<?php echo $this->get_field_name( 'iconalignment' ); ?>" id="<?php echo $this->get_field_id( 'iconalignment' ); ?>">
        <option value="Left" <?php echo ($iconalignment == 'Left') ? 'selected' : ''; ?>>Left</option>
        <option value="Right" <?php echo ($iconalignment == 'Right') ? 'selected' : ''; ?>>Right</option>
    </select>
</p>
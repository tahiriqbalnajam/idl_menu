<style>
.idl-menu-item {
    border-style: solid;
    background: <?php echo $bgcolor?>;
    border-width: <?php echo ($borderwidth) ? $borderwidth : '0'?>px;
    border-color: <?php echo $bordercolor?>;
    border-radius: <?php echo ($borderadius)? $borderadius : '0'?>px;

    margin-top: <?php echo ($margintop) ? $margintop : '0'?>px !important;
    margin-bottom: <?php echo ($marginbottom) ? $marginbottom : '0'?>px !important;
    margin-left: <?php echo ($marginleft) ? $marginleft : '0'?>px !important;
    margin-right: <?php echo ($marginright) ? $marginright : '0'?>px !important;
}
.idl-menu-item:hover {
    background: <?php echo $bgcolorhover?>
}
.idl-menu-item a {
    color: <?php echo $fontcolor;?>;
    padding-right: <?php echo ($marginright)? $paddingright : '0'?>px  !important;
    padding-top: <?php echo ($paddingtop)? $paddingtop : '0'?>px  !important;
    padding-left: <?php echo ($paddingleft)? $paddingleft : '0'?>px  !important;
    padding-bottom: <?php echo ($paddingbottom)? $paddingbottom : '0'?>px !important;
    display:block;
}
.idl-menu-item:hover a {
    color: <?php echo $fonthovercolor;?>
}
</style>
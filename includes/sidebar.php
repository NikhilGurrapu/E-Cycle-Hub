<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <a href="shop.php?outofstock" style="text-decoration: none;">
        <h3 class="panel-title">Out of Stock</h3>
        </a>
    </div>
</div>
<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">Brand
            <div class="pull-right">
                <a href="JavaScript:Void(0);" style="color: black;text-decoration:none;">
                    <span class="nav-toggle hide-show">
                        <i class="fa fa-chevron-down"></i>
                    </span>
                </a>
            </div>
        </h3>
    </div>

    <div class="panel-collapse collapse-data" style="display: none;">
        <div class="panel-body">

            <div class="input-group">
                <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-brand" data-action="filter" placeholder="Filter">
                <a href="" class="input-group-addon">
                    <i class="fa fa-search"></i>
                </a>
            </div>
        </div>
        
        <div class="panel-body scroll-menu">

            <ul class="nav nav-pills nav-stacked category-menu" id="dev-brand">
                <?php
                get_brand();
                ?>
            </ul>

        </div>
    </div>
</div><!--Brand-->

<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">Colors
            <div class="pull-right">
                <a href="JavaScript:Void(0);" style="color: black;text-decoration:none;">
                    <span class="nav-toggle hide-show">
                        <i class="fa fa-chevron-down"></i>
                    </span>
                </a>
            </div>
        </h3>
    </div>

    <div class="panel-collapse collapse-data" style="display: none;">
        <div class="panel-body">

            <div class="input-group">
                <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-color" data-action="filter" placeholder="Filter">
                <a href="" class="input-group-addon">
                    <i class="fa fa-search"></i>
                </a>
            </div>
        </div>
        
        <div class="panel-body scroll-menu">

            <ul class="nav nav-pills nav-stacked category-menu" id="dev-color">
                <?php get_colors(); ?>
            </ul>

        </div>
    </div>
</div><!--Color-->

<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">Gear
            <div class="pull-right">
                <a href="JavaScript:Void(0);" style="color: black;text-decoration:none;">
                    <span class="nav-toggle hide-show">
                        <i class="fa fa-chevron-down"></i>
                    </span>
                </a>
            </div>
        </h3>
    </div>

    <div class="panel-collapse collapse-data" style="display: none;">
        <div class="panel-body">

            <div class="input-group">
                <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-gear" data-action="filter" placeholder="Filter">
                <a href="" class="input-group-addon">
                    <i class="fa fa-search"></i>
                </a>
            </div>
        </div>
        
        <div class="panel-body scroll-menu">

            <ul class="nav nav-pills nav-stacked category-menu" id="dev-gear">
                <?php
                get_gear();
                ?>
            </ul>

        </div>
    </div>
</div><!--Gear-->

<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">Frame Material
            <div class="pull-right">
                <a href="JavaScript:Void(0);" style="color: black;text-decoration:none;">
                    <span class="nav-toggle hide-show">
                        <i class="fa fa-chevron-down"></i>
                    </span>
                </a>
            </div>
        </h3>
    </div>

    <div class="panel-collapse collapse-data" style="display: none;">
        <div class="panel-body">

            <div class="input-group">
                <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-frame" data-action="filter" placeholder="Filter">
                <a href="" class="input-group-addon">
                    <i class="fa fa-search"></i>
                </a>
            </div>
        </div>
        
        <div class="panel-body scroll-menu">

            <ul class="nav nav-pills nav-stacked category-menu" id="dev-frame">
                <?php
                get_frame();
                ?>
            </ul>

        </div>
    </div>
</div><!--Frame Material-->

<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">Wheel Size
            <div class="pull-right">
                <a href="JavaScript:Void(0);" style="color: black;text-decoration:none;">
                    <span class="nav-toggle hide-show">
                        <i class="fa fa-chevron-down"></i>
                    </span>
                </a>
            </div>
        </h3>
    </div>

    <div class="panel-collapse collapse-data" style="display: none;">
        <div class="panel-body">

            <div class="input-group">
                <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-tyre" data-action="filter" placeholder="Filter">
                <a href="" class="input-group-addon">
                    <i class="fa fa-search"></i>
                </a>
            </div>
        </div>
        
        <div class="panel-body scroll-menu">

            <ul class="nav nav-pills nav-stacked category-menu" id="dev-tyre">
                <?php
                get_tyre();
                ?>
            </ul>

        </div>
    </div>
</div><!--Wheel size-->

<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">Distance
            <div class="pull-right">
                <a href="JavaScript:Void(0);" style="color: black;text-decoration:none;">
                    <span class="nav-toggle hide-show">
                        <i class="fa fa-chevron-down"></i>
                    </span>
                </a>
            </div>
        </h3>
    </div>

    <div class="panel-collapse collapse-data" style="display: none;">
        <div class="panel-body">

            <div class="input-group">
                <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-distance" data-action="filter" placeholder="Filter">
                <a href="" class="input-group-addon">
                    <i class="fa fa-search"></i>
                </a>
            </div>
        </div>
        
        <div class="panel-body scroll-menu">

            <ul class="nav nav-pills nav-stacked category-menu" id="dev-distance">
                <?php
                get_distance();
                ?>
            </ul>

        </div>
    </div>
</div><!--Distance-->

                    <div class="panel panel-default sidebar-menu">
                        <div class="panel-heading">
                            <h3 class="panel-title">Categories
                                <div class="pull-right">
                                    <a href="JavaScript:Void(0);" style="color: black;text-decoration:none;">
                                        <span class="nav-toggle hide-show">
                                            <i class="fa fa-chevron-down"></i>
                                        </span>
                                    </a>
                                </div>
                            </h3>
                        </div>

                        <div class="panel-collapse collapse-data" style="display: none;">
                            <div class="panel-body">

                                <div class="input-group">
                                    <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-manufacturer" data-action="filter" placeholder="Filter">
                                    <a href="" class="input-group-addon">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="panel-body scroll-menu">

                                <ul class="nav nav-pills nav-stacked category-menu" id="dev-manufacturer">
                                    <?php
                                        get_p_cat();
                                    ?>
                                </ul>

                            </div>
                        </div>
                    </div>
<?php 
error_reporting(0);
?>
<!-- Left Sidebar Menu -->
<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
            <span>Main</span> 
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="fa fa-laptop mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"><!--i class="zmdi zmdi-caret-down"--></i></div><div class="clearfix"></div></a>
            <!--ul id="dashboard_dr" class="collapse collapse-level-1">
                    <li>
                            <a class="active-page" href="index.html">Analytical</a>
                    </li>
                    <li>
                            <a href="index2.html">Demographic</a>
                    </li>
                    <li>
                            <a href="index3.html">Project</a>
                    </li>
                    <li>
                            <a href="index4.html">Hospital</a>
                    </li>
                    <li>
                            <a href="index5.html">HRM</a>
                    </li>
                    <li>
                            <a href="index6.html">Real Estate</a>
                    </li>
                    <li>
                            <a href="profile.html">profile</a>
                    </li>
            </ul-->
        </li>

        <li><hr class="light-grey-hr mb-10"/></li>
        <li class="navigation-header">
            <span>module</span> 
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#finance_dr"><div class="pull-left"><i class="fa fa-money mr-20"></i><span class="right-nav-text">Finance </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="finance_dr" class="collapse collapse-level-1">
                <li>
                    <a href="cumulative.php?rst=0">Cumulative</a>
                </li>
                <li>
                    <a href="trustfunds.php">Trust funds</a>
                </li>
                <li>
                    <a href="income.php?set=all&rst=0">Income</a> <!-- income.php?rst=0 -->
                </li>
                <li>
                    <a href="expenditure.php?rst=0">Expenditure</a> <!-- expenditure.php?rst=0 -->
                </li>

                <li>
                    <a href="requisitions-invoice2.php?rst=0">Requisitions</a> <!-- requisitions.php?rst=0 -->
                </li>
                <li>
                    <a href="receipts.php?set=all">Receipts</a> <!-- receipts.php?rst=0 -->
                </li>
                <li>
                    <a href="#">Budgets</a> <!-- budgets.php?rst=0 -->
                </li>
            </ul>
        </li>


        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#messages_dr"><div class="pull-left"><i class="fa fa-comments-o mr-20"></i><span class="right-nav-text">Messages </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="messages_dr" class="collapse collapse-level-1">
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#all_dr">All<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="inbox_dr" class="collapse collapse-level-2">
                        <li>
                            <a href="messages.php?set=all&box=">All</a> <!-- inbox.html -->
                        </li> 
                        <li>
                            <a href="messages.php?set=all&box=">Inbox</a> <!-- inbox.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=all&box=">Outbox</a> <!-- inbox-detail.html  -->
                        </li>
                        <li>
                            <a href="messages.php?set=all&box=">Sentbox</a> <!-- inbox-detail.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=all&box=">Deletebox</a> <!-- inbox-detail.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=all&box=">Draftbox</a> <!-- inbox-detail.html -->
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#email_dr">Email<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="email_dr" class="collapse collapse-level-2">
                         <li>
                            <a href="messages.php?set=email&box=all">All</a> <!-- inbox.html -->
                        </li> 
                        <li>
                            <a href="messages.php?set=email&box=inbox">Inbox</a> <!-- inbox.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=email&box=outbox">Outbox</a> <!-- inbox-detail.html  -->
                        </li>
                        <li>
                            <a href="messages.php?set=email&box=sentbox">Sentbox</a> <!-- inbox-detail.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=email&box=deletebox">Deletebox</a> <!-- inbox-detail.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=email&box=draft">Draftbox</a> <!-- inbox-detail.html -->
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#sms_dr">SMS<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="sms_dr" class="collapse collapse-level-2">
                        <li>
                            <a href="messages.php?set=sms&box=all">All</a> <!-- inbox.html -->
                        </li> 
                        <li>
                            <a href="messages.php?set=sms&box=inbox">Inbox</a> <!-- inbox.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=sms&box=outbox">Outbox</a> <!-- inbox-detail.html  -->
                        </li>
                        <li>
                            <a href="messages.php?set=sms&box=sentbox">Sentbox</a> <!-- inbox-detail.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=sms&box=deletebox">Deletebox</a> <!-- inbox-detail.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=sms&box=draft">Draftbox</a> <!-- inbox-detail.html -->
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#chat_dr">Chat<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="chat_dr" class="collapse collapse-level-2">
                        <li>
                            <a href="messages.php?set=chat&box=all">All</a> <!-- inbox.html -->
                        </li> 
                        <li>
                            <a href="messages.php?set=chat&box=inbox">Inbox</a> <!-- inbox.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=chat&box=outbox">Outbox</a> <!-- inbox-detail.html  -->
                        </li>
                        <li>
                            <a href="messages.php?set=chat&box=sentbox">Sentbox</a> <!-- inbox-detail.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=chat&box=deletebox">Deletebox</a> <!-- inbox-detail.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=chat&box=draft">Draftbox</a> <!-- inbox-detail.html -->
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#draftbox_dr">Forum<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="draftbox_dr" class="collapse collapse-level-2">
                        <li>
                            <a href="messages.php?set=frm&box=all">All</a> <!-- inbox.html -->
                        </li> 
                        <li>
                            <a href="messages.php?set=frm&box=inbox">Inbox</a> <!-- inbox.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=frm&box=outbox">Outbox</a> <!-- inbox-detail.html  -->
                        </li>
                        <li>
                            <a href="messages.php?set=frm&box=sentbox">Sentbox</a> <!-- inbox-detail.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=frm&box=deletebox">Deletebox</a> <!-- inbox-detail.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=frm&box=draft">Draftbox</a> <!-- inbox-detail.html -->
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#voice_dr">Voice<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="voice_dr" class="collapse collapse-level-2">
                         <li>
                            <a href="messages.php?set=voc&box=all">All</a> <!-- inbox.html -->
                        </li> 
                        <li>
                            <a href="messages.php?set=voc&box=inbox">Inbox</a> <!-- inbox.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=voc&box=outbox">Outbox</a> <!-- inbox-detail.html  -->
                        </li>
                        <li>
                            <a href="messages.php?set=voc&box=sentbox">Sentbox</a> <!-- inbox-detail.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=voc&box=deletebox">Deletebox</a> <!-- inbox-detail.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=voc&box=draft">Draftbox</a> <!-- inbox-detail.html -->
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#forms_dr">Web Forms<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="forms_dr" class="collapse collapse-level-2">
                         <li>
                            <a href="messages.php?set=frm&box=all">All</a> <!-- inbox.html -->
                        </li> 
                        <li>
                            <a href="messages.php?set=frm&box=prayer">Prayer</a> <!-- inbox.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=frm&box=baptism">Baptism</a> <!-- inbox-detail.html  -->
                        </li>
                        <li>
                            <a href="messages.php?set=frm&box=biblestudy">BibleStudy</a> <!-- inbox-detail.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=frm&box=testimony">Testimony</a> <!-- inbox-detail.html -->
                        </li>
                        <li>
                            <a href="messages.php?set=frm&box=visitation">Visitation</a> <!-- inbox-detail.html -->
                        </li>
                        <li>
                            <a href="pledges.php">Pledges</a> <!-- inbox-detail.html -->
                        </li>
                    </ul>
                </li>
            </ul>
        </li>


        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar_dr"><div class="pull-left"><i class="fa fa-calendar mr-20"></i><span class="right-nav-text">Calendar </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="calendar_dr" class="collapse collapse-level-1">
                <li>
                    <a href="#">Notices</a> <!-- chats.html -->
                </li>
                <li>
                    <a href="#">Holidays</a> <!-- calendar.html  -->
                </li>
                <li>
                    <a href="#">Reminders</a> <!-- weather.html -->
                </li>
                <li>
                    <a href="#">Appointments</a> <!-- file-manager.html  -->
                </li>
                <li>
                    <a href="./program.php">Programmes</a> <!-- file-manager.html  -->
                </li>
            </ul>
        </li>


        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#profile_dr"><div class="pull-left"><i class="fa fa-group mr-20"></i><span class="right-nav-text">Profiles </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="profile_dr" class="collapse collapse-level-1">
                    <li>
                        <a href="people.php?cat=all">All</a>
                    </li>
                    <li>
                            <a href="people.php?cat=mem">Members</a>
                    </li>
                    <li>
                            <a href="people.php?cat=vst">Visitors</a>
                    </li>
                    <li>
                            <a href="people.php?cat=stf">Staff</a>
                    </li>
                    <li>
                            <a href="people.php?cat=oth">Others</a>
                    </li>
            </ul>
        </li>


        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#inventory_dr"><div class="pull-left"><i class="fa fa-cubes mr-20"></i><span class="right-nav-text">Inventory </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="inventory_dr" class="collapse collapse-level-1">
                <li>
                    <a href="apartments.php">Apartments</a>
                </li>
                <li>
                    <a href="#">Equipment</a> <!-- chats.html  -->
                </li>
                <li>
                    <a href="#">Furniture</a> <!-- calendar.html  -->
                </li>
                <li>
                    <a href="#">Stationery</a> <!--  weather.html -->
                </li>
                <li>
                    <a href="#">Books</a> <!-- file-manager.html  -->
                </li>
                <li>
                    <a href="#">Documents</a> <!-- todo-tasklist.html  -->
                </li>
                <li>
                    <a href="#">Records</a> <!--  todo-tasklist.html -->
                </li>
            </ul>
        </li>


        <li><hr class="light-grey-hr mb-10"/></li>
        <li class="navigation-header">
            <span>system accessories</span> 
            <i class="zmdi zmdi-more"></i>
        </li>

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#settings_dr"><div class="pull-left"><i class="fa  fa-cogs mr-20"></i><span class="right-nav-text">Settings </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="settings_dr" class="collapse collapse-level-1">
                <li>
                    <a href="#">Permissions</a>  <!-- chats.html -->
                </li>
                <li>
                    <a href="#">Billing Options</a> <!-- calendar.html -->
                </li>
                <li>
                    <a href="#">System Logs</a> <!-- weather.html -->
                </li>
            </ul>
        </li>


        <!--li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">E-Commerce</span></div><div class="pull-right"><span class="label label-success">hot</span></div><div class="clearfix"></div></a>
                <ul id="ecom_dr" class="collapse collapse-level-1">
                        <li>
                                <a href="e-commerce.html">Dashboard</a>
                        </li>
                        <li>
                                <a href="product.html">Products</a>
                        </li>
                        <li>
                                <a href="product-detail.html">Product Detail</a>
                        </li>
                        <li>
                                <a href="add-products.html">Add Product</a>
                        </li>
                        <li>
                                <a href="product-orders.html">Orders</a>
                        </li>
                        <li>
                                <a href="product-cart.html">Cart</a>
                        </li>
                        <li>
                                <a href="product-checkout.html">Checkout</a>
                        </li>
                </ul>
        </li-->
        <!--li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Apps </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                <ul id="app_dr" class="collapse collapse-level-1">
                        <li>
                                <a href="chats.html">chats</a>
                        </li>
                        <li>
                                <a href="calendar.html">calendar</a>
                        </li>
                        <li>
                                <a href="weather.html">weather</a>
                        </li>
                        <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#email_dr">Email<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                                <ul id="email_dr" class="collapse collapse-level-2">
                                        <li>
                                                <a href="inbox.html">inbox</a>
                                        </li>
                                        <li>
                                                <a href="inbox-detail.html">detail email</a>
                                        </li>
                                </ul>
                        </li>
                        <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#contact_dr">Contacts<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                                <ul id="contact_dr" class="collapse collapse-level-2">
                                        <li>
                                                <a href="contact-list.html">list</a>
                                        </li>
                                        <li>
                                                <a href="contact-card.html">cards</a>
                                        </li>
                                </ul>
                        </li>
                        <li>
                                <a href="file-manager.html">File Manager</a>
                        </li>
                        <li>
                                <a href="todo-tasklist.html">To Do/Tasklist</a>
                        </li>
                </ul>
        </li>
        <li>
                <a href="widgets.html"><div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">widgets</span></div><div class="pull-right"><span class="label label-warning">8</span></div><div class="clearfix"></div></a>
        </li>
        <li><hr class="light-grey-hr mb-10"/></li>
        <li class="navigation-header">
                <span>component</span> 
                <i class="zmdi zmdi-more"></i>
        </li>
        <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#ui_dr"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">UI Elements</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                <ul id="ui_dr" class="collapse collapse-level-1 two-col-list">
                        <li>
                                <a href="panels-wells.html">Panels & Wells</a>
                        </li>
                        <li>
                                <a href="modals.html">Modals</a>
                        </li>
                        <li>
                                <a href="sweetalert.html">Sweet Alerts</a>
                        </li>
                        <li>
                                <a href="notifications.html">notifications</a>
                        </li>
                        <li>
                                <a href="typography.html">Typography</a>
                        </li>
                        <li>
                                <a href="buttons.html">Buttons</a>
                        </li>
                        <li>
                                <a href="accordion-toggle.html">Accordion / Toggles</a>
                        </li>
                        <li>
                                <a href="tabs.html">Tabs</a>
                        </li>
                        <li>
                                <a href="progressbars.html">Progress bars</a>
                        </li>
                        <li>
                                <a href="skills-counter.html">Skills & Counters</a>
                        </li>
                        <li>
                                <a href="pricing.html">Pricing Tables</a>
                        </li>
                        <li>
                                <a href="nestable.html">Nestables</a>
                        </li>
                        <li>
                                <a href="dorpdown.html">Dropdowns</a>
                        </li>
                        <li>
                                <a href="bootstrap-treeview.html">Tree View</a>
                        </li>
                        <li>
                                <a href="carousel.html">Carousel</a>
                        </li>
                        <li>
                                <a href="range-slider.html">Range Slider</a>
                        </li>
                        <li>
                                <a href="grid-styles.html">Grid</a>
                        </li>
                        <li>
                                <a href="bootstrap-ui.html">Bootstrap UI</a>
                        </li>
                </ul>
        </li>
        <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#form_dr"><div class="pull-left"><i class="zmdi zmdi-edit mr-20"></i><span class="right-nav-text">Forms</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                <ul id="form_dr" class="collapse collapse-level-1 two-col-list">
                        <li>
                                <a href="form-element.html">Basic Forms</a>
                        </li>
                        <li>
                                <a href="form-layout.html">form Layout</a>
                        </li>
                        <li>
                                <a href="form-advanced.html">Form Advanced</a>
                        </li>
                        <li>
                                <a href="form-mask.html">Form Mask</a>
                        </li>
                        <li>
                                <a href="form-picker.html">Form Picker</a>
                        </li>
                        <li>
                                <a href="form-validation.html">form Validation</a>
                        </li>
                        <li>
                                <a href="form-wizard.html">Form Wizard</a>
                        </li>
                        <li>
                                <a href="form-x-editable.html">X-Editable</a>
                        </li>
                        <li>
                                <a href="cropperjs.html">Cropperjs</a>
                        </li>
                        <li>
                                <a href="form-file-upload.html">File Upload</a>
                        </li>
                        <li>
                                <a href="dropzone.html">Dropzone</a>
                        </li>
                        <li>
                                <a href="bootstrap-wysihtml5.html">Bootstrap Wysihtml5</a>
                        </li>
                        <li>
                                <a href="tinymce-wysihtml5.html">Tinymce Wysihtml5</a>
                        </li>
                        <li>
                                <a href="summernote-wysihtml5.html">summernote</a>
                        </li>
                        <li>
                                <a href="typeahead-js.html">typeahead</a>
                        </li>
                </ul>
        </li>
        <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart_dr"><div class="pull-left"><i class="zmdi zmdi-chart-donut mr-20"></i><span class="right-nav-text">Charts </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                <ul id="chart_dr" class="collapse collapse-level-1 two-col-list">
                        <li>
                                <a href="flot-chart.html">Flot Chart</a>
                        </li>
                        <li>
                                <a href="echart.html">Echart Chart</a>
                        </li>
                        <li>
                                <a href="morris-chart.html">Morris Chart</a>
                        </li>
                        <li>
                                <a href="chart.js.html">chartjs</a>
                        </li>
                        <li>
                                <a href="chartist.html">chartist</a>
                        </li>
                        <li>
                                <a href="easy-pie-chart.html">Easy Pie Chart</a>
                        </li>
                        <li>
                                <a href="sparkline.html">Sparkline</a>
                        </li>
                        <li>
                                <a href="peity-chart.html">Peity Chart</a>
                        </li>
                </ul>
        </li>
        <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#table_dr"><div class="pull-left"><i class="zmdi zmdi-format-size mr-20"></i><span class="right-nav-text">Tables</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                <ul id="table_dr" class="collapse collapse-level-1 two-col-list">
                        <li>
                                <a href="basic-table.html">Basic Table</a>
                        </li>
                        <li>
                                <a href="bootstrap-table.html">Bootstrap Table</a>
                        </li>
                        <li>
                                <a href="data-table.html">Data Table</a>
                        </li>
                        <li>
                                <a href="export-table.html">Export Table</a>
                        </li>
                        <li>
                                <a href="responsive-data-table.html">RSPV DataTable</a>
                        </li>
                        <li>
                                <a href="responsive-table.html">Responsive Table</a>
                        </li>
                        <li>
                                <a href="editable-table.html">Editable Table</a>
                        </li>
                        <li>
                                <a href="foo-table.html">Foo Table</a>
                        </li>
                        <li>
                                <a href="jsgrid-table.html">Jsgrid Table</a>
                        </li>
                </ul>
        </li>
        <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#icon_dr"><div class="pull-left"><i class="zmdi zmdi-iridescent mr-20"></i><span class="right-nav-text">Icons</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                <ul id="icon_dr" class="collapse collapse-level-1">
                        <li>
                                <a href="fontawesome.html">Fontawesome</a>
                        </li>
                        <li>
                                <a href="themify.html">Themify</a>
                        </li>
                        <li>
                                <a href="linea-icon.html">Linea</a>
                        </li>
                        <li>
                                <a href="simple-line-icons.html">Simple Line</a>
                        </li>
                        <li>
                                <a href="pe-icon-7.html">Pe-icon-7</a>
                        </li>
                        <li>
                                <a href="glyphicons.html">Glyphicons</a>
                        </li>
                </ul>
        </li>
        <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#maps_dr"><div class="pull-left"><i class="zmdi zmdi-map mr-20"></i><span class="right-nav-text">maps</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                <ul id="maps_dr" class="collapse collapse-level-1">
                        <li>
                                <a href="vector-map.html">Vector Map</a>
                        </li>
                        <li>
                                <a href="google-map.html">Google Map</a>
                        </li>
                </ul>
        </li>
        <li><hr class="light-grey-hr mb-10"/></li>
        <li class="navigation-header">
                <span>featured</span> 
                <i class="zmdi zmdi-more"></i>
        </li>
        <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#pages_dr"><div class="pull-left"><i class="zmdi zmdi-google-pages mr-20"></i><span class="right-nav-text">Special Pages</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                <ul id="pages_dr" class="collapse collapse-level-1 two-col-list">
                        <li>
                                <a href="blank.html">Blank Page</a>
                        </li>
                        <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth_dr">Authantication pages<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                                <ul id="auth_dr" class="collapse collapse-level-2">
                                        <li>
                                                <a href="login.html">Login</a>
                                        </li>
                                        <li>
                                                <a href="signup.html">Register</a>
                                        </li>
                                        <li>
                                                <a href="forgot-password.html">Recover Password</a>
                                        </li>
                                        <li>
                                                <a href="reset-password.html">reset Password</a>
                                        </li>
                                        <li>
                                                <a href="locked.html">Lock Screen</a>
                                        </li>
                                </ul>
                        </li>
                        <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#invoice_dr">Invoice<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                                <ul id="invoice_dr" class="collapse collapse-level-2">
                                        <li>
                                                <a href="invoice.html">Invoice</a>
                                        </li>
                                        <li>
                                                <a href="invoice-archive.html">Invoice Archive</a>
                                        </li>
                                </ul>
                        </li>
                        <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#error_dr">error pages<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                                <ul id="error_dr" class="collapse collapse-level-2">
                                        <li>
                                                <a href="404.html">Error 404</a>
                                        </li>
                                        <li>
                                                <a href="500.html">Error 500</a>
                                        </li>
                                </ul>
                        </li>
                        <li>
                                <a href="gallery.html">Gallery</a>
                        </li>
                        <li>
                                <a href="timeline.html">Timeline</a>
                        </li>
                        <li>
                                <a href="faq.html">FAQ</a>
                        </li>
                </ul>
        </li>
        <li>
                <a href="documentation.html"><div class="pull-left"><i class="zmdi zmdi-book mr-20"></i><span class="right-nav-text">documentation</span></div><div class="clearfix"></div></a>
        </li>
        <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_lv1"><div class="pull-left"><i class="zmdi zmdi-filter-list mr-20"></i><span class="right-nav-text">multilevel</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                <ul id="dropdown_dr_lv1" class="collapse collapse-level-1">
                        <li>
                                <a href="#">Item level 1</a>
                        </li>
                        <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_lv2">Dropdown level 2<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                                <ul id="dropdown_dr_lv2" class="collapse collapse-level-2">
                                        <li>
                                                <a href="#">Item level 2</a>
                                        </li>
                                        <li>
                                                <a href="#">Item level 2</a>
                                        </li>
                                </ul>
                        </li>
                </ul>
        </li-->
    </ul>
</div>
<!-- /Left Sidebar Menu -->
<?php 
?>


<div id="myModalview" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div  class="tab-struct custom-tab-1">
                    <ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
                        <li class="active" role="presentation"><a  data-toggle="tab" id="profile" role="tab" href="#profile_tab" aria-expanded="false"><span>Profile</span></a></li>
                        <li  role="presentation" class="next"><a aria-expanded="true"  data-toggle="tab" role="tab" id="contacts" href="#contacts_tab"><span>Contacts</a></li>
                        <li role="presentation" class=""><a  data-toggle="tab" id="location" role="tab" href="#location_tab" aria-expanded="false"><span>Location</span></a></li>
                        <li role="presentation" class=""><a  data-toggle="tab" id="membership" role="tab" href="#membership_tab" aria-expanded="false"><span>Membership</span></a></li>
                        <li role="presentation" class=""><a  data-toggle="tab" id="collection" role="tab" href="#collection_tab" aria-expanded="false"><span>Collection</span></a></li>
                        <li role="presentation" class=""><a  data-toggle="tab" id="healthinfo" role="tab" href="#healthinfo_tab" aria-expanded="false"><span>Healthinfo</span></a></li>

                    </ul>
                    <div class="tab-content" id="myTabContent_8">
                        
                        <div  id="profile_tab" class="tab-pane fade active in" role="tabpanel">
                            <div class="col-md-12">
                                <div class="pt-20">
                                    <div class="streamline user-activity">
                                     
                                        <div class="sl-item">
                                            <a href="javascript:void(0)">
                                                <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                    <img class="img-responsive img-circle" src="../img/user4.png" alt="avatar"/>
                                                </div>
                                                <div class="sl-content">
                                                    <p class="inline-block"><span class="capitalize-font txt-success mr-5 weight-500">jonnie metoyer</span><span>created a group 'Hencework' in the discussion forum</span></p>
                                                    <span class="block txt-grey font-12 capitalize-font">18 feb</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div  id="contacts_tab" class="tab-pane fade active in" role="tabpanel">
                            <div class="col-md-12">
                                <div class="pt-20">
                                    <div class="streamline user-activity">
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-wrap">
                                            <form action="#">
                                                <div class="form-body overflow-hide">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="exampleInputuname_1">Name</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="icon-user"></i></div>
                                                            <input type="text" class="form-control" id="exampleInputuname_1" placeholder="Karnegat seems">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="exampleInputEmail_1">Email address</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                            <input type="email" class="form-control" id="exampleInputEmail_1" placeholder="xyz@gmail.com">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="exampleInputContact_1">Contact number</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                            <input type="email" class="form-control" id="exampleInputContact_1" placeholder="+102 9388333">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label mb-10" for="exampleInputpwd_1">Password</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                            <input type="password" class="form-control" id="exampleInputpwd_1" placeholder="Enter pwd" value="password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label mb-10">Gender</label>
                                                        <div>
                                                            <div class="radio">
                                                                <input type="radio" name="radio1" id="radio_1" value="option1" checked="">
                                                                <label for="radio_1">
                                                                    M
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <input type="radio" name="radio1" id="radio_2" value="option2">
                                                                <label for="radio_2">
                                                                    F
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label mb-10">Country</label>
                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                            <option value="Category 1">USA</option>
                                                            <option value="Category 2">Austrailia</option>
                                                            <option value="Category 3">India</option>
                                                            <option value="Category 4">UK</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-actions mt-10">			
                                                    <button type="submit" class="btn btn-success mr-10 mb-30">Update profile</button>
                                                </div>				
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
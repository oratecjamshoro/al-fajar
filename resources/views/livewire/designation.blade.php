<div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Designation<span class="text-danger">*</span></label>
                                                    {!! Form::select('emp_designation', $designations, null, ['class' => 'form-control','id'=>'designation','data-toggle'=>'select2','wire:click'=>'changeEvent($event.target.value)']) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div>

                                        
                                        <div class="row">
                                            <div class="col-md-6" style="display: none" id="user_name">
                                                <div class="form-group">
                                                    <label>Username<span class="text-danger">*</span></label>
                                                    <input type="text" name="email" parsley-trigger="change"
                                                        placeholder="Enter Username" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="display: none;" id="password">
                                                <div class="form-group">
                                                    <label>Password<span class="text-danger">*</span></label>
                                                    <input type="password" name="password" parsley-trigger="change"
                                                        placeholder="Enter Password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
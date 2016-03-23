
                      <div class="form-group">
                       {!! Form::label('email', 'Dirección de E-Mail',array('class' => 'col-md-4 control-label'))!!}
                            <div class="col-md-6">
                            {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Email'])!!}
                            </div>
                      </div>
                      <div class="form-group">
                        {!! Form::label('password', 'Password',array('class' => 'col-md-4 control-label'))!!}
                            <div class="col-md-6">
                           {!! Form::password('password',['class'=>'form-control'])!!}  
                           </div>
                        </div>
                      <div class="form-group">
                       {!! Form::label('name', 'Nombre',array('class' => 'col-md-4 control-label'))!!}
                            <div class="col-md-6">
                           {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Introduzca su nombre'])!!}
                           </div>
                      </div>
                      <div class="form-group">
                       {!! Form::label('lastname', 'Apellido',array('class' => 'col-md-4 control-label'))!!}
                            <div class="col-md-6">
                           {!! Form::text('lastname',null,['class'=>'form-control','placeholder'=>'Introduzca su apellido'])!!}
                          </div>
                      </div>
                        <div class="form-group">
                            {!! Form::label('gender', 'Género',array('class' => 'col-md-4 control-label')) !!}							
                              <div class="col-md-6">
                                  <div class="radio"> 
                                     {!! Form::label('') !!}  
                                     {!! Form::radio('gender', 'female',old('gender')) !!}
                                     Mujer
                                 </div> 
                                 <div class="radio"> 
                                     {!! Form::label('') !!}
                                     {!! Form::radio('gender', 'male',old('gender')) !!}
                                     Hombre
                                  </div>
                             </div>
		      </div>
                      <div class="form-group">
                       {!! Form::label('role', 'Rol de usuario',array('class' => 'col-md-4 control-label'))!!}
                             <div class="col-md-6">
                              {!!Form::select('role',config('options.types'),null,['class'=>'form-control'])!!}
                             </div>
                      </div>

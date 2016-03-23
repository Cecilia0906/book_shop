                      <div class="form-group">
                       {!! Form::label('name', 'Nombre',array('class' => 'col-md-4 control-label'))!!}
                            <div class="col-md-6">
                           {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Introduzca el nombre del autor'])!!}
                           </div>
                      </div>
                    <div class="form-group">
                       {!! Form::label('lastname', 'Apellido',array('class' => 'col-md-4 control-label'))!!}
                            <div class="col-md-6">
                           {!! Form::text('lastname',null,['class'=>'form-control','placeholder'=>'Introduzca el apellido del autor'])!!}
                           </div>
                     </div>
                    <div class="form-group">    
                        {!! Form::label('birthdate', 'Fecha de nacimiento',array('class' => 'col-md-4 control-label')) !!}
                         <div class="col-md-6">
                           {!!  Form::date('birthdate', null,['class' => 'form-control']) !!}
                         </div>
                    </div>

                    <div class="form-group">
                       {!! Form::label('nationality', 'Nacionalidad',array('class' => 'col-md-4 control-label'))!!}
                            <div class="col-md-6">
                           {!! Form::text('nationality',null,['class'=>'form-control','placeholder'=>'Introduzca la nacionalidad del autor'])!!}
                           </div>
                      </div>


                    </div>

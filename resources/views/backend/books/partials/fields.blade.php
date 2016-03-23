                      <div class="form-group">
                       {!! Form::label('title', 'Nombre',array('class' => 'col-md-4 control-label'))!!}
                            <div class="col-md-6">
                           {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Introduzca el titulo del libro'])!!}
                           </div>
                      </div>
 
  
                      <div class="form-group">
                       {!! Form::label('editorial_id', 'Editorial',array('class' => 'col-md-4 control-label'))!!}
                             <div class="col-md-6">
                              {!!Form::select('editorial_id', $editorials, null,['class'=>'form-control'])!!}
                             </div>
                      </div>
                      <div class="form-group">
                       {!! Form::label('category_id', 'Categoría',array('class' => 'col-md-4 control-label'))!!}
                             <div class="col-md-6">
                              {!!Form::select('category_id',$categories ,null,['class'=>'form-control'])!!}
                             </div>
                      </div>
                    <div class="form-group">
                         {!! Form::label('Autor', '',array('class' => 'col-md-4 control-label')) !!}	
                         <div class="col-md-6">
                           {!! Form::select('authors[]', App\Models\Author::lists('name','id')->toArray(), $bookselect, ['multiple','placeholder' => 'Seleccione un autor','class' => 'form-control']) !!}	
                         </div> 
                     </div>
                    <div class="form-group">
                        {!! Form::label('photo', 'Imágen',array('class' => 'col-md-4 control-label')) !!}
                         <div class="col-md-6">
                          {!! Form::file('photo', null,['class' => 'field']) !!}
                        </div> 
                    </div>

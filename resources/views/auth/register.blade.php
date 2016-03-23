@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registro</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Error!</strong> Hubieron algunos problemas con los campos.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

				
                                        {!! Form::open(['route' => 'register', 'method' => 'POST','class'=>'form-horizontal']) !!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
                                                    {!! Form::label('name', 'Nombre',array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
                                                            {!! Form::text('name', old('name'),['class' => 'form-control']) !!}
						     
							</div>
						</div>
                                                
                                                <div class="form-group">
                                                    {!! Form::label('lastname', 'Apellido',array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
                                                            {!! Form::text('lastname', old('lastname'),['class' => 'form-control']) !!}
						     
							</div>
						</div>
                                                
                                                <div class="form-group">    
                                                    {!! Form::label('birthdate', 'Fecha de nacimiento',array('class' => 'col-md-4 control-label')) !!}
                                                     <div class="col-md-6">
                                                       {!!  Form::date('birthdate', \Carbon\Carbon::now(),['class' => 'form-control']) !!}
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
                                           
                                               <fieldset class="scheduler-border">
                                                     
                                                    <div class="form-group">
                                                        {!! Form::label('', '',array('class' => 'col-md-4 control-label')) !!}	
                                                        <div class="col-md-6">
                                                          {!! Field::select('pais_id', App\Models\Country::lists('nombre','id')->toArray(), 0, ['placeholder' => 'Seleccione su País','class' => 'form-control']) !!}	
                                                        </div> 
                                                    </div>

                                                    <div class="form-group">
                                                        {!! Form::label('', '',array('class' => 'col-md-4 control-label')) !!}	
                                                        <div class="col-md-6">
                                                          {!! Field::select('provincia_id','' ,  null, ['placeholder' => 'Seleccione su Provincia','class' => 'form-control']) !!}	
                                                        </div> 
                                                    </div>

                                                    <div class="form-group">
                                                        {!! Form::label('', '',array('class' => 'col-md-4 control-label')) !!}	
                                                        <div class="col-md-6">
                                                          {!! Field::select('ciudad_id', '', null, ['placeholder' => 'Seleccione su Ciudad','class' => 'form-control']) !!}	
                                                        </div> 
                                                    </div>
                                              </fieldset>
<!--                                                <div class="form-group">
                                                    {!! Form::label('interests', 'Intereses',array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
                                                         <label class="checkbox-inline">
                                                         {!!   Form::checkbox('interests', 'Deportes', true) !!}
                                                         </label>
                                                         <label class="checkbox-inline">
                                                         {!!   Form::checkbox('interests', 'Cocina', false) !!}
                                                          </label>
                                                         <label class="checkbox-inline">
                                                         {!!   Form::checkbox('interests', 'Filosofía', true) !!}
                                                          </label>
                                                            
						     
							</div>
						</div>-->
                                                
                                                <div class="form-group">
                                                {!! Form::label('photo_id', 'Imágen',array('class' => 'col-md-4 control-label')) !!}
                                                  {!! Form::file('photo_id', ['class' => 'field']) !!}
                                                
                                                </div>
                                                

							
                                                
                 

                                                
                                                
                                  
                                                
<!--                                               <div class="form-group">
                                                         {!! Form::label('birthdate', 'Fecha de nacimiento',array('class' => 'col-md-4 control-label')) !!}
                                                         <div class="col-md-6">
                                                           <div class='' id='datepicker1'>
                                                         {!! Form::text('birthdate', old('birthdate'),['class' => 'form-control']) !!}

                                                       </div>
                                                      </div>
                             
                                             
                                                </div>-->
                                                
						<div class="form-group">
                                                    {!! Form::label('email', 'E-Mail ',array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
                                                           {!!  Form::email('email', $value = old('email'), ['class' => 'form-control']) !!}
								
							</div>
						</div>

						<div class="form-group">
                                                      {!! Form::label('passwordl', 'password',array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
                                                           {!! Form::password('password', array('class' => 'form-control')) !!}
								
							</div>
						</div>

						<div class="form-group">
                                                      {!! Form::label('password_confirmation', 'Confirma tu password',array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
                                                             {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
								
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
                                                           {!! Form::submit('Registrarme',array('class' => 'btn btn-primary')) !!}
					
							</div>
						</div>
					
                                        {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')

<script type="text/javascript" src="{!! asset('js/jquery.pickmeup.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>

@endsection



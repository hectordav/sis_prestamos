<div class="right_col" role="main" style="height:auto">
	    	<div class="x_panel" >
					<div class="container">
						<div class="row" >
							<div class="col-md-12 col-sm-12 col-xs-12 animated fadeIn" >

			<div class="table-label">
				<h4><strong>Ver  Ficha Prestamo<strong></h4>
				</div>
			<div class="form-container table-container">
				<?php if ($prestamo): ?>
						<?php foreach ($prestamo as $key): ?>
				<form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>prestamo/imprimir_ficha_prestamo" method="POST"  enctype="multipart/form-data">
				<div class="col-md-3 col-sm-3 col-xs-6 col-lg-offset-4 col-sm-offset-4 col-xs-offset-3">
				<input type="hidden" name="txt_id_cliente" value="<?=$key->id_cliente?>">

				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					
					<div class="col-md-1 col-sm-1 col-xs-1" align="right">
					</div>
					<div class="col-md-5 col-sm-5 col-xs-10" align="left">
						
						<h5><label>Cliente:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><?=$key->dni_cliente?>, <?=$key->nombre_cliente?></strong></label>&nbsp;&nbsp;
						
						</h5>
					</div>
				<?php endforeach ?>
				<?php endif ?>
			
					
					</div>
	<?php if ($prestamo): ?>
								<?php foreach ($prestamo as $key): ?>

<!-- ******************************************************************************* -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-4" align="right">
						<h5><label>Fecha P</label></h5></P>
						</div>
					   <div class="col-md-10 col-sm-10 col-xs-12">
					   <?$fecha= date('d-m-Y',strtotime($key->fecha_prestamo))?>
						<input type="text" id="txt_monto_aprobado" name="txt_monto_aprobado" class="form-control" value="<?=$fecha?>"  onkeyup="fnccalulo_monto_aprobar()" placeholder="Ingrese Porcentaje" required="true" readonly>
						</div>
</div>
<!-- ********************************************************************************** -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-4" align="right">
						<h5><label>Culminacion</label></h5></P>
						</div>
						<?  	$fecha_cul=strtotime( '+26 day' , strtotime ($key->fecha_prestamo));
						$fecha_cul_2=date('d-m-Y',$fecha_cul)?>
					   <div class="col-md-10 col-sm-10 col-xs-12">
					   <?$fecha= date('d-m-Y',strtotime($key->fecha_prestamo))?>
						<input type="text" id="txt_monto_aprobado" name="txt_monto_aprobado" class="form-control" value="<?=$fecha_cul_2?>"  onkeyup="fnccalulo_monto_aprobar()" placeholder="Ingrese Porcentaje" required="true" readonly>
						</div>
</div>
<!-- ********************************************************************************* -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-4" align="right">
						<h5><label>Monto</label></h5></P>
						</div>
					   <div class="col-md-10 col-sm-10 col-xs-12">
						<input type="number" id="txt_monto_aprobado" name="txt_monto_aprobado" class="form-control" value="<?=$key->monto_prestado?>"  onkeyup="fnccalulo_monto_aprobar()" placeholder="Ingrese Porcentaje" required="true" readonly>
						</div>
</div>
<!-- ******************************************************************************* -->


<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-12" align="right">
						<h5><label>porcentaje</label></h5></P>
						</div>
					   <div class="col-md-10 col-sm-10 col-xs-12">
		<input type="number" class="form-control" name="txt_portentaje_aprobado" id="txt_portentaje_aprobado"  onkeyup="fnccalulo_monto_aprobar()" value="<?=$key->porcentaje?>" placeholder="Ingrese Porcentaje a Aprobar" required="true" readonly>
		
						</div>
					</div>

<!-- ***************************************** -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-12" align="right">
						<h5><label>Total Prestamo</label></h5></P>
						</div>
					   <div class="col-md-10 col-sm-10 col-xs-12">
		<input type="number" class="form-control" name="txt_total_prestamo" id="txt_total_prestamo" value="<?=$key->total_prestado?>" required="true"readonly="true">
						</div>
</div>
<!-- ************************************************** -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-12" align="right">
						<h5><label>Monto x Cuotas</label></h5></P>
						</div>
					   <div class="col-md-10 col-sm-10 col-xs-12">
		<input type="number" class="form-control" name="txt_monto_x_cuota" id="txt_monto_x_cuota" value="<?=$key->monto_x_cuotas?>" placeholder="" readonly="true">
						</div>
</div>
<!-- ************************************************** -->
<div class="col-md-12 col-sm-12 col-xs-12" align="right">
					<div class="col-md-2 col-sm-2 col-xs-12">
						<h5><label>Cuotas amortizadas</label></h5></P>
						</div>
					   <div class="col-md-10 col-sm-10 col-xs-12">
		<input type="number"  onkeyup="fnccalulo_monto()" class="form-control" name="txt_num_cuotas" id="txt_num_cuotas" value="<?=$key->cuotas_amortizadas?>" required="true" readonly>
						</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12" align="right">
					<div class="col-md-2 col-sm-2 col-xs-12">
						<h5><label>Dinero amortizado</label></h5></P>
						</div>
					<?$total_prestado=$key->total_prestado;
					$total_debe=$key->total_debe;

					$dinero_amortizado=$total_prestado-$total_debe;
					?>
					   <div class="col-md-10 col-sm-10 col-xs-12">
		<input type="number"  onkeyup="fnccalulo_monto()" class="form-control" name="txt_num_cuotas" id="txt_num_cuotas" value="<?=$dinero_amortizado?>" required="true" readonly>
						</div>
</div>
<!-- ************************************************** -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-12" align="right">
						<h5><label>Cuotas debe</label></h5></P>
						</div>
					   <div class="col-md-10 col-sm-10 col-xs-12">
		<input type="number"  onkeyup="fnccalulo_monto_aprobar()" class="form-control" name="txt_num_cuotas_aprobadas" id="txt_num_cuotas_aprobadas" value="<?=$key->cuotas_debe?>" required="true" readonly>
						</div>
					
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-12" align="right">
						<h5><label>Total debe</label></h5></P>
						</div>
					   <div class="col-md-10 col-sm-10 col-xs-12">
		<input type="number"  onkeyup="fnccalulo_monto_aprobar()" class="form-control" name="txt_num_cuotas_aprobadas" id="txt_num_cuotas_aprobadas" value="<?=$key->total_debe?>" required="true" readonly>
						</div>
					
</div>
<!-- ************************************************** -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-12" align="right">
						<h5><label>Atrasos Generados</label></h5></P>
						</div>
					   <div class="col-md-10 col-sm-10 col-xs-12">

		<input type="number"  onkeyup="fnccalulo_monto_aprobar()" class="form-control" name="txt_num_cuotas_aprobadas" id="txt_num_cuotas_aprobadas" value="<?=$suma_atraso?>" required="true" readonly>
						</div>
					
</div>

<!-- *************************************************** -->

<div class="col-md-12 col-sm-12 col-xs-12">

	<div class="col-md-2 col-sm-2 col-xs-12" align="right">
	<h5><label>Penalidad generadas</label></h5>
	</div>
	<div class="col-md-10 col-sm-10 col-xs-12">
	<input type="number"  onkeyup="fnccalulo_monto_aprobar()" class="form-control" name="txt_num_cuotas_aprobadas" id="txt_num_cuotas_aprobadas" value="<?=$key->penalidad?>" required="true" readonly>
	</div>
</div>
			<!-- *** -->
			<div id="aprueba_prestamo" style="display: block;" class="animated fadeInDown">
					<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-2 col-sm-2 col-xs-12" align="right">
								<h5><label>Proximo Pago</label></h5></P>
								</div>
							   <div class="col-md-10 col-sm-10 col-xs-4">
							    <?$fecha=date('d-m-Y', strtotime($key->fecha_prox_cobro))?>
							  	<input type="text" class="form-control" id="txt_fecha_prox_pago" name="txt_fecha_prox_pago" class="form-control" value="<?=$fecha?>" readonly> 
								</div>
					</div>

			</div>
					<?php endforeach ?>
					<?php endif ?>
<div class="col-md-12 col-sm-12 col-xs-12" align="center">
<hr>
</div>
<!-- ************************************************** -->
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-6 col-sm-6 col-xs-12" align="center">
		<h3><span class ="label label-info">Pagos</span></h3></strong>
		<table class="table table-condensed table-bordered table-hover">
	<thead>
		<tr>
			<td class="info">Tipo</td>
			<td class="info"># Cuotas</td>
			<td class="info">Monto</td>
			<td class="info">Fecha Pago</td>
			<td class="info">Observacion</td>
		</tr>
	</thead>
	<tbody>
		
		<?php if ($det_prestamo): ?>
			<?php foreach ($det_prestamo as $key): ?>
		<tr>
			<td><?=$key->descripcion_tipo_prestamo?></td>
			<td><?=$key->cuota_det_prestamo?></td>
			<td><?=$key->monto_det_prestamo?></td>
			<?$fecha=date('d-m-Y', strtotime($key->fecha_cobro_det_prestamo))?>
			<td><?=$fecha?></td>
			<td><?=$key->observaciones_det_prestamo?></td>
		</tr>
						<?php endforeach ?>
		<?php endif ?>

		
	</tbody>
</table>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12" align="center">
		<h3><span class ="label label-info">Atrasos</span></h3></strong>
		<table class="table table-condensed table-bordered table-hover">
	<thead>
		<tr>
			<td class="info">Fecha de atraso</td>
			<td class="info">Prox dia Cobro</td>
			<td class="info">Observaciones</td>
			
		</tr>
	</thead>
	<tbody><?php if ($atraso): ?>
		<?php foreach ($atraso as $key): ?>
		<tr>
	
			<?$fecha_atraso=date('d-m-Y', strtotime($key->fecha_atraso))?>
			<td><?=$fecha_atraso?></td>
			<?$fecha_prox_cobro=date('d-m-Y', strtotime($key->fecha_prox_cobro))?>
			<td><?=$fecha_prox_cobro?></td>
			<td><?=$key->observaciones?></td>
			
			<?php endforeach ?>
	<?php endif ?>
		</tr>
	</tbody>
</table>
	</div>
	
</div>
		
<!--******************los botones***********************-->
					<div class="col-md-12 col-sm-12 col-xs-12" id="botones" style="display: block">
					  <hr>
							<div class="col-md-12 col-sm-12 col-xs-12" align="center">
							 <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-print"></i>&nbsp;Imprimir</button>
							 <a href="<?=$this->config->base_url()?>prestamo/grilla_cliente_general" class="btn btn-warning btn-lg" title=""><i class="fa fa-print"></i>&nbsp;Volver</a>
							
							</div>
									</form>
					  
					</div>
			</div>
			<br>
		</div>
	</div>
  </div>
 </div>
	    	</div>
</div>

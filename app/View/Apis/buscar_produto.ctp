<?php if (!empty($produtos)){ ?>
	<?php foreach ($produtos as $produto) { ?>
		<div class="frb frb-default">
             <input  type="radio"  name="produtos" value="<?php echo $produto['pro']['id'] ?>"  onclick='habilitar_botao_2()' id='<?php echo $produto['pro']['nome'] ?> - R$ <?php echo $produto['ptv']['unitario'] ?>'/>

            <label for="<?php echo $produto['pro']['nome'] ?> - R$ <?php echo $produto['ptv']['unitario'] ?>"> 
                <span class="frb-description"><?php echo $produto['pro']['nome'] ?> - R$ <?php echo $produto['ptv']['unitario'] ?>  </span>
            </label>
        </div>
	<?php }?>	
<?php }else{ ?>
	<p>Nenhum produto encontrado</p>
<?php } ?>

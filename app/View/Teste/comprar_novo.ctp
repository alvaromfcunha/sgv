<form method="POST" id="signup-form" class="signup-form" action="#">
  <div>
      <h3>Local de Validação</h3>
      <fieldset>
          <h2>Local de Validação</h2>
          <p class="desc">Por favor escolha o local de validacao para prosseguir</p>
          <div class="fieldset-content">


          <!-- Kleber aqui   -->
          <?php echo $this->Form->create('Venda',array("enctype"=>"multipart/form-data","id"=>"formulario-vendas"));
                echo $this->Form->input('estado_id', array('id'=>'estado','options' => $array_estados, 'class' => 'standardSelect form-control', 'label' => 'Estado','empty' => 'Selecione...' ,'style'=>'text-transform: uppercase')); 
          ?>
          <div id='pro'> 
            <?php  
              echo $this->Form->input('cidade_id',array('type'=>'text','label' => 'Cidade','class' => 'form-control','id'=>'unitario','readonly ' => 'true','value'=>'Selecione o estado.'));
            ?>
          </div>
          <div id='unidade'> 
            <?php  
              echo $this->Form->input('unidade',array('type'=>'text','label' => 'Unidade de Atendimento','class' => 'form-control','id'=>'unitario','readonly ' => 'true','value'=>'Selecione o estado e a Cidade.'));
            ?>
          </div>        
          </div>
      </fieldset>

      <h3>Connect Bank Account</h3>
      <fieldset>
          <h2>Connect Bank Account</h2>
          <p class="desc">Please enter your infomation and proceed to next step so we can build your account</p>
          <div class="fieldset-content">
              <div class="form-group">
                  <label for="find_bank" class="form-label">Find Your Bank</label>
                  <div class="form-find">
                      <input type="text" name="find_bank" id="find_bank" placeholder="Ex. Techcombank" />
                      <input type="submit" value="Search" class="submit">
                      <span class="form-icon"><i class="zmdi zmdi-search"></i></span>
                  </div>
              </div>
              <div class="choose-bank">
                  <p class="choose-bank-desc">Or choose from these popular bank</p>
                  <div class="form-radio-flex">
                      <div class="form-radio-item">
                          <input type="radio" name="choose_bank" id="bank_1" value="bank_1" checked="checked" />
                          <label for="bank_1"><img src="<?php echo $this->webroot ?>assets_compra_facil/images/bank-1.jpg" alt=""></label>
                      </div>

                      <div class="form-radio-item">
                          <input type="radio" name="choose_bank" id="bank_2" value="bank_2" />
                          <label for="bank_2"><img src="<?php echo $this->webroot ?>assets_compra_facil/images/bank-2.jpg" alt=""></label>
                      </div>

                      <div class="form-radio-item">
                          <input type="radio" name="choose_bank" id="bank_3" value="bank_3" />
                          <label for="bank_3"><img src="<?php echo $this->webroot ?>assets_compra_facil/images/bank-3.jpg" alt=""></label>
                      </div>
                      <div class="form-radio-item">
                          <input type="radio" name="choose_bank" id="bank_3" value="bank_3" />
                          <label for="bank_3"><img src="<?php echo $this->webroot ?>assets_compra_facil/images/bank-3.jpg" alt=""></label>
                      </div>
                      <div class="form-radio-item">
                          <input type="radio" name="choose_bank" id="bank_3" value="bank_3" />
                          <label for="bank_3"><img src="<?php echo $this->webroot ?>assets_compra_facil/images/bank-3.jpg" alt=""></label>
                      </div>
                      <div class="form-radio-item">
                          <input type="radio" name="choose_bank" id="bank_3" value="bank_3" />
                          <label for="bank_3"><img src="<?php echo $this->webroot ?>assets_compra_facil/images/bank-3.jpg" alt=""></label>
                      </div>
                      <div class="form-radio-item">
                          <input type="radio" name="choose_bank" id="bank_3" value="bank_3" />
                          <label for="bank_3"><img src="<?php echo $this->webroot ?>assets_compra_facil/images/bank-3.jpg" alt=""></label>
                      </div>
                      <div class="form-radio-item">
                          <input type="radio" name="choose_bank" id="bank_3" value="bank_3" />
                          <label for="bank_3"><img src="<?php echo $this->webroot ?>assets_compra_facil/images/bank-3.jpg" alt=""></label>
                      </div>
                      <div class="form-radio-item">
                          <input type="radio" name="choose_bank" id="bank_3" value="bank_3" />
                          <label for="bank_3"><img src="<?php echo $this->webroot ?>assets_compra_facil/images/bank-3.jpg" alt=""></label>
                      </div>
                      <div class="form-radio-item">
                          <input type="radio" name="choose_bank" id="bank_3" value="bank_3" />
                          <label for="bank_3"><img src="<?php echo $this->webroot ?>assets_compra_facil/images/bank-3.jpg" alt=""></label>
                      </div>
                      <div class="form-radio-item">
                          <input type="radio" name="choose_bank" id="bank_3" value="bank_3" />
                          <label for="bank_3"><img src="<?php echo $this->webroot ?>assets_compra_facil/images/bank-3.jpg" alt=""></label>
                      </div>
                      <div class="form-radio-item">
                          <input type="radio" name="choose_bank" id="bank_3" value="bank_3" />
                          <label for="bank_3"><img src="<?php echo $this->webroot ?>assets_compra_facil/images/bank-3.jpg" alt=""></label>
                      </div>

                      <div class="form-radio-item">
                          <input type="radio" name="choose_bank" id="bank_4" value="bank_4" />
                          <label for="bank_4"><img src="<?php echo $this->webroot ?>assets_compra_facil/images/bank-4.jpg" alt=""></label>
                      </div>

                      <div class="form-radio-item">
                          <input type="radio" name="choose_bank" id="bank_5" value="bank_5" />
                          <label for="bank_5"><img src="<?php echo $this->webroot ?>assets_compra_facil/images/bank-5.jpg" alt=""></label>
                      </div>

                      <div class="form-radio-item">
                          <input type="radio" name="choose_bank" id="bank_6" value="bank_6" />
                          <label for="bank_6"><img src="<?php echo $this->webroot ?>assets_compra_facil/images/bank-6.jpg" alt=""></label>
                      </div>
                      
                      <div class="form-radio-item">
                          <input type="radio" name="choose_bank" id="bank_7" value="bank_7" />
                          <label for="bank_7"><img src="<?php echo $this->webroot ?>assets_compra_facil/images/bank-7.jpg" alt=""></label>
                      </div>

                      <div class="form-radio-item">
                          <input type="radio" name="choose_bank" id="bank_8" value="bank_8" />
                          <label for="bank_8"><img src="<?php echo $this->webroot ?>assets_compra_facil/images/bank-8.jpg" alt=""></label>
                      </div>
                  </div>
              </div>
          </div>
      </fieldset>

      <h3>Set Financial Goals</h3>
      <fieldset>
          <h2>Set Financial Goals</h2>
          <p class="desc">Set up your money limit to reach the future plan</p>
          <div class="fieldset-content">
              <div class="donate-us">
                  <div class="price_slider ui-slider ui-slider-horizontal">
                      <div id="slider-margin"></div>
                      <p class="your-money">
                          Your money you can spend per month :
                          <span class="money" id="value-lower"></span>
                          <span class="money" id="value-upper"></span>
                      </p>
                  </div>
              </div>
          </div>
      </fieldset>
  </div>
</form>



<script>
  $(function(){


    $().chosen().change(

      $('#estado').bind('change', function(){ 
        console.log($('#estado').serialize());
        $.ajax({
          async:true, 
          type:'post', 
          complete:function(request, json) {
            $('#pro').html(request.responseText); 
            
          }, 
          url:'<?php echo $this->Html->url(array("controller"=>"Teste","action"=>"atualiza_cidade")) ?>', 
          data:$('#estado').serialize()
        })
        
      })

    );

    

    

  });
</script>
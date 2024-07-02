<?php 
    require_once('checkout_config.php');
    require_once('checkout_utils.php');

    $params = array(
        'email' => $PAGSEGURO_EMAIL,
        'token' => $PAGSEGURO_TOKEN
    );
    $header = array();

    $response = curlExec($PAGSEGURO_API_URL."/sessions", $params, $header);
    $json = json_decode(json_encode(simplexml_load_string($response)));
    $sessionCode = $json->id;
    ?>

    
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-border alert-border-success alert-dismissible fade show text-success" role="alert">
                <i class="far fa-credit-card "></i> 
                Faça sua recarga e continue aproveitando o melhor da análise financeira!
            </div>
        </div>
    </div>

    <div class="row">
        
        <div class="col-md-6">
            Através do menu Extrato, você poderá acompanhar a sua movimentação de recarga e custo de análises. <br>
            <br>Loc Pop Consultas, mais segurança e transparência para você!
        </div>

        <div class="col-md-6 bg-soft-success">
        
            <div class="panel panel-default">

                <div class="panel-body">
                    <form action="./checkout_pay.php" method="POST">

                        <input type="hidden" name="brand">
                        <input type="hidden" name="token">
                        <input type="hidden" name="senderHash">
                        <!-- <input type="hidden" name="amount" value="100.00"> -->
                        <input type="hidden" name="shippingCoast" value="1.00">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="amount">Valor a ser creditado</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control input-mask text-start" name="amount" id="amount"  required autofocus data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'digits': 2, 'digitsOptional': false, 'prefix': '', 'placeholder': '0'" im-insert="true" style="text-align: right;"/>
                                        
                                    </div>
                                </div>                            
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">Nº Cartão</label>
                                    <div class="input-group">
                                        <input type="tel" class="form-control" name="cardNumber" id="cardNumber" placeholder="Valid Card Number" autocomplete="cc-number" required autofocus value="4111 1111 1111 1111"/>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-5">
                                <div class="form-group">
                                    <label for="cardExpiry">Validade</label>
                                    <input type="tel" class="form-control input-mask" name="cardExpiry" id="cardExpiry" placeholder="MM/YY" autocomplete="cc-exp" required value="12/2030" data-inputmask="'mask': '99/9999'" im-insert="true"/>
                                    
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-4">
                                <div class="form-group">
                                    <label for="cardCVC">CVV</label>
                                    <input type="number" class="form-control" name="cardCVC" id="cardCVC" placeholder="CVV" autocomplete="cc-csc" required value="123"/>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="installments">Parcelas</label>
                                    <div class="input-group">
                                        <select name="installments" id="select-installments" class="form-select">
                                            <option value="">Selecione as parcelas</option>
                                            <option value="1">1</option>
                                        </select>
                                        <input type="hidden" name="installmentValue">
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row mt-4 text-center" id="div_footer">
                            <div class="col-xs-12">
                                <button class="btn btn-success btn-lg" type="button" id="pagar2" onclick="ChamaPgto();">Pagar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
            
        </div>
                 
        
    </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <script type="text/javascript" src="<?= $JS_FILE_URL ?>"></script>

  <script>
        var installments = [];
    
        $("input[name='cardNumber']").keyup(function(){
            getInstallments();
        });

        $("#select-installments").change(function(){
            //console.log(installments[$(this).val()-1]);
            $("input[name='installmentValue']").val(installments[$(this).val()-1].installmentAmount);
        });

        function getInstallments(){
            
            var cardNumber = $("input[name='cardNumber']").val();
            
            //if creditcard number is finished, get installments
            if(cardNumber.length != 19){
                return;
            } 

            PagSeguroDirectPayment.getBrand({
                cardBin: cardNumber.replace(/ /g,''),
                success: function(json){
                    //console.log(json);
                    var brand = json.brand.name;
                    $("input[name='brand']").val(brand);
                    
                    var amount = parseFloat($("input[name='amount']").val());
                    var shippingCoast = parseFloat($("input[name='shippingCoast']").val());
                    
                    //The maximum installment qty with no extra fees (You must configure it on your PagSeguro dashboard with same value)
                    var max_installment_no_extra_fees = 2;

                    PagSeguroDirectPayment.getInstallments({
                        amount: amount + shippingCoast,
                        brand: brand,
                        maxInstallmentNoInterest: max_installment_no_extra_fees,
                        success: function(response) {
                            
                            /*
                                Available installments options.
                                Here you have quantity and value options
                            */
                           // console.log(response);
                            installments = response.installments[brand];
                            $("#select-installments").html("");
                            for(var installment of installments){
                                $("#select-installments").append("<option value='" + installment.quantity + "'>" + installment.quantity + " x R$ " + installment.installmentAmount + " - " + (installment.quantity <= max_installment_no_extra_fees? "Sem" : "Com")  + " Juros</option>");
                            }

                        }, error: function(response) {
                            //console.log(response);
                        }, complete: function(response) {
                            //Called after sucess or error
                        } 
                    });
                }, error: function(json){
                    //console.log(json);
                }, complete: function(json){
                    //console.log(json);
                }
            });
        }
            
        //$("button").click(function(){
        
            //$(".pagar2").click(function(){
        function ChamaPgto(){
            if (document.getElementById('amount').value==''){
                alert('Informe o valor para prosseguir!');
                document.getElementById('amount').focus();
            }else if(document.getElementById('cardNumber').value==''){
                alert('Informe o numero do cartão para prosseguir!');
                document.getElementById('cardNumber').focus();
            }else if(document.getElementById('cardExpiry').value==''){
                alert('Informe a validade do cartão para prosseguir!');
                document.getElementById('cardExpiry').focus();
            }else if(document.getElementById('cardCVC').value==''){
                alert('Informe o código de segurança do cartão para prosseguir!');
                document.getElementById('cardCVC').focus();
            }else if(document.getElementById('select-installments').value==''){
                alert('Informe a quantidade de parcelas para prosseguir!');
                document.getElementById('select-installments').focus();
            }else{
                document.getElementById('div_footer').innerHTML='<img src="assets/images/loading.gif" style="width:58px; height:58px;">';
                //alert('ok');
                var param = {
                    cardNumber: $("input[name='cardNumber']").val().replace(/ /g,''),
                    brand: $("input[name='brand']").val(),
                    cvv: $("input[name='cardCVC']").val(),
                    expirationMonth: $("input[name='cardExpiry']").val().split('/')[0],
                    expirationYear: $("input[name='cardExpiry']").val().split('/')[1],
                    success: function(json){
                        var token = json.card.token;
                        $("input[name='token']").val(token);
                        console.log("Token: " + token);

                        var senderHash = PagSeguroDirectPayment.getSenderHash();
                        $("input[name='senderHash']").val(senderHash);
                        $("form").submit();
                    }, error: function(json){
                        console.log(json);
                    }, complete:function(json){
                    }
                }

                PagSeguroDirectPayment.createCardToken(param);
            }
            
        };

        jQuery(function($) {

            var shippingCoast = parseFloat($("input[name='shippingCoast']").val());
            var amount = parseFloat($("input[name='amount']").val());
            $("input[name='installmentValue']").val(amount + shippingCoast);

            PagSeguroDirectPayment.setSessionId('<?php echo $sessionCode;?>');

            PagSeguroDirectPayment.getPaymentMethods({
                success: function(json){

                    //console.log(json);
                    getInstallments();

                }, error: function(json){
                    //console.log(json);
                    var erro = "";
                    for(i in json.errors){
                        erro = erro + json.errors[i];
                    }
                    
                    alert(erro);
                }, complete: function(json){
                }
            });
            });

    </script>

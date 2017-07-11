//requires synaptic reference ==> "https://cdnjs.cloudflare.com/ajax/libs/synaptic/1.0.12/synaptic.js"


//function to train nueral net
function use_to_train_network(activation_function,network_type,array_to_train_input_output,iterationsx,errorx,ratex,first_level,second_level,third_level,fourth_level) {
	
var Neuron = activation_function,
//Neuron.squash.LOGISTIC
// Neuron.squash.TANH
// Neuron.squash.IDENTITY
// Neuron.squash.HLIM
// Neuron.squash.ReLU
Layer = synaptic.Layer,
  Network = synaptic.Network,
  Trainer = synaptic.Trainer,
  Architect = synaptic.Architect;

var options = {
  memoryToMemory: false,      // default is false
  outputToMemory: false,      // default is false
  outputToGates: false,       // default is false
  inputToOutput: true         // default is true
};

var myNetwork = new Architect.LSTM(first_level, second_level, third_level, fourth_level, 1, options);
var trainer = new Trainer(myNetwork);

trainer.train(array_to_train_input_output,{
  rate: ratex,
  iterations: iterationsx,
  error: errorx,
  shuffle: true,
  log: 1000,
  cost: Trainer.cost.CROSS_ENTROPY
});



return myNetwork;
}

//function to store nueral net
function use_to_store_nueral_net(urlx,network_to_store) {
	// Export the network to a JSON which you can save as plain text
var stored = network_to_store.toJSON();
console.log(stored);

   $.ajax({
        url : urlx,
        type: "POST",
        data: JSON.stringify([stored]),
        contentType: "application/json; charset=utf-8",
        dataType   : "json",
        success    : function(response){
            console.log("Server Response => success :"+response);
        },
        error: function(xhr, textStatus, errorThrown){
        console.log("failure :"+errorThrown);
    }
    });

   return stored;

}

//function to use stored nueral net
//NOTE: This it to implememnted with in the client code directly
function use_stored_nueral_net(url,array_to_predict_20) {
	  var neededData; 
	  var prediction; 
	  var data_returned;
	  var myRestoredNet;
var jqxhr = $.getJSON( url, function(data) {
  neededData = JSON.parse(data);

  

   myRestoredNet = synaptic.Network.fromJSON(neededData[0]);

 prediction = myRestoredNet.activate(array_to_predict_20/*$.parseJSON(array_to_predict_20)*/)
  console.log( "success" );

})
  .done(function(data) {
  
  })
  .fail(function() {
    console.log( "error" );
  })
  .always(function() {
   console.log(prediction);
  });

//return prediction;

}

//function to use nueral net without storing
function use_nueral_net_before_storing(networky,array_to_predict_20) {
	 var prediction; 
prediction = networky.activate(array_to_predict_20)
//console.log( prediction);
return prediction;
}

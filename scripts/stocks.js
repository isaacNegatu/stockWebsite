const ALPHABET = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

function addGraph(tabName, symbol, index){

	var button = "</br>" +
	"<form action = 'stocks.php' method = 'POST' >" +
		"<input name = 'stockSymbol' value = '" + symbol + "' hidden />" +
		"<button type = 'submit'  id = '" + index + "' class = 'btn btn-success'>Buy "+ tabName + "</button>" +
	"</form>";


	$("#charts").prepend(button);
	$('#charts').prepend(`<!-- TradingView Widget BEGIN -->
		</br>
	<div class="tradingview-widget-container">
	  <div id="tv-medium-widget"></div>
	  <div class="tradingview-widget-copyright"><span class="blue-text"><a href="https://www.tradingview.com/symbols/`+ symbol + `/" rel="noopener" target="_blank"><span class="blue-text">` + tabName + `</span></a></span> <span class="blue-text">Quotes</span></div>
	  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
	  <script type="text/javascript">
	  new TradingView.MediumWidget(
	  {
	  "container_id": "tv-medium-widget",
	  "symbols": [
	    [
	      "` + tabName + `",
	      "` + symbol + `"
	    ]
	  ],
	  "greyText": "Quotes by",
	  "gridLineColor": "#e9e9ea",
	  "fontColor": "#83888D",
	  "underLineColor": "#dbeffb",
	  "trendLineColor": "#4bafe9",
	  "width": "100%",
	  "height": "50%",
	  "locale": "en"
	}
	  );
	  </script>
	</div>
	</br>
	<!-- TradingView Widget END -->`);



}


function execute(){

  var stocks = {
		"Ford":"F",
  	"Tesla": "TSLA",
    "Apple": "AAPL",
    "Sony": "SNE",
		"Microsoft" : "MSFT",
		"Google": "GOOGL",
  }

  var index = 0;

	for (const prop in stocks) {
		addGraph(prop, stocks[prop], ALPHABET[index]);
	}
}

$(document).ready(execute);

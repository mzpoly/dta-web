<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<title>Question adding form</title>
		{!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
		{!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css') !!}
		<!--[if lt IE 9]>
		{{ Html::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') }}
		{{ Html::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
		<![endif]-->
	</head>

	<body id="body">
	<div class="col-sm-offset-3 col-sm-6">
	<div class="panel panel-info">

		<div class="panel-heading"> Add a new question </div>

			<div class="panel-body" id = "divbody">

				{!! Form::open(['url' => 'questions']) !!}


				<br>

				
				<textarea name="infos" rows = "5" cols ="45" class="form-control" placeholder="write the question here: "></textarea>

				<br> <br>
	
				<input checked ="checked" type="radio" name="myRadios" onclick="handleClick(this);" value="3" />  3 possible anwers  <br>
				<input type="radio" name="myRadios" onclick="handleClick(this);" value="4" />  4 possible anwers <br>
				<input type="radio" name="myRadios" onclick="handleClick(this);" value="5" />  5 possible anwers <br><br>

				<div id="DA1"><label for='A1'> answer A </label> <input type ="text" id="A1" /></div> <br>
				<div id="DA2"><label for='A2'> answer B </label> <input type ="text" id="A2" /></div> <br>
				<div id="DA3"><label for='A3'> answer C </label> <input type ="text" id="A3" /></div> <br>
				<div id="DA4" style="display:none;"><label for='A4'> answer D </label> <input type ="text" id="A4" /></div> <br>
				<div id="DA5" style="display:none;"><label for='A5'> answer E </label> <input type ="text" id="A5" /></div> <br>
				<br>

				<script type="text/javascript">

				var numbans = 3;
	

    			function handleClick(myRadio) {
        			numbans = myRadio.value;

 	      		 if (numbans == 3){
    	  			  	var div4 = document.getElementById('DA4');
    	    			div4.style.display = "none";

        				var div5 = document.getElementById('DA5');
        				div5.style.display = "none";

					}

        			if (numbans == 4){
       			 		var div4 = document.getElementById('DA4');
        				div4.style.display = "block";

        				var div5 = document.getElementById('DA5');
        				div5.style.display = "none";

					}
					if (numbans == 5) {
						var div4 = document.getElementById('DA4');
 			       		div4.style.display = "block";

        				var div5 = document.getElementById('DA5');
        				div5.style.display = "block";
					}   
		    	}


	

				</script>

		

				<input type="file" name="monfichier" /> <div id="prev"></div>

				<script type="text/javascript">
					(function() {
						function createThumbnail(file) {
							var reader = new FileReader();

       						reader.addEventListener('load', function() {

           						var imgElement = document.createElement('img');
         					    imgElement.style.maxWidth = '150px';
           						imgElement.style.maxHeight = '150px';
      					        imgElement.src = this.result;
         						prev.appendChild(imgElement);

        					});

    					    reader.readAsDataURL(file);

    					}

    					var allowedTypes = ['png', 'jpg', 'jpeg', 'gif'],
        				fileInput = document.querySelector('#file'),
        				prev = document.querySelector('#prev');

    					fileInput.addEventListener('change', function() {

        					var files = this.files,
            				filesLen = files.length,
            				imgType;

        					for (var i = 0; i < filesLen; i++) {

            					imgType = files[i].name.split('.');
            					imgType = imgType[imgType.length - 1];

            					if (allowedTypes.indexOf(imgType) != -1) {
                					createThumbnail(files[i]);
           						}

        					}

    					});

					})();
				</script>

				

				<br><br>
				{!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>

	</body>

</html>
<?php
	require_once('libraries/functions.php');
	$userName = 'herelss';
	$data = getData('herelss');
	
?>

<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
		<title>Feed twitter</title>
		<style type="text/css">
			body{
				margin: 0px;
				padding: 0px;
				font-family: 'Lato', sans-serif;
				background-image: linear-gradient(-35deg, #36AC91 3%, #5AD0FF 94%);
				background-repeat: no-repeat;
				background-size: cover;
			}
			.container-redes{
				width: 100%;
				height: calc(100vh);
				display: flex;
				flex-direction: row;
				align-items: center;
				justify-content: center;
			}
			.container-redes .boxnetwork{
				min-width: 368px;
				height: 450px;
				max-width: 368px;
				display: flex;
				flex-direction: column;
				align-items: center;
				justify-content: center;
			}


			.container-redes .boxnetwork .tweet{
				padding: 15px;
				padding-bottom: 0px;
				padding-top: 0px;
				margin-bottom: 15px;
			}
			.container-redes .boxnetwork a{
				text-decoration: none;
				cursor: pointer;
				display: block;
				padding-top: 5px;
				padding-bottom: 5px;
			}

			.container-redes .boxnetwork a:hover{
				background-color: rgba(255,255,255,.06);

			}

			.container-redes .boxnetwork .tweet p{
				color: white;
				font-size: 14px;
				font-family: 'Open Sans', sans-serif;
				margin: 0px;
				margin-top: 5px;
				padding: 0px;
			}

			.container-redes .boxnetwork .tweet  img.video{
				margin-top: 10px;
				display: block;
			}

			.container-redes .boxnetwork .tweet span.date{
				font-size: 11px;
				color: white;
				font-family: 'Open Sans', sans-serif;
				display: block;
				margin-top: 5px;
				margin-bottom: 5px;
			}
			.container-redes .boxnetwork a.title{
				width: 100%;
				min-height: 60px;
				display: flex;
				flex-direction: row;
				align-items: center;
				justify-content: flex-start;
				color: white;
				text-decoration: none;
				background-color: rgba(255,255,255,0.1);
			}

			.container-redes .boxnetwork a.title span{
				margin-left: 15px;
			}
			.container-redes .boxnetwork.twitter{
				background-color: #2AA6F2;
			}
			.container-redes .boxnetwork .content{
				height: 100%;
				overflow: scroll;
				width: 100%;
			}

			.container-redes .boxnetwork .content p{
				white-space: pre;           /* CSS 2.0 */
				white-space: pre-wrap;      /* CSS 2.1 */
				white-space: pre-line;      /* CSS 3.0 */
				white-space: -pre-wrap;     /* Opera 4-6 */
				white-space: -o-pre-wrap;   /* Opera 7 */
				white-space: -moz-pre-wrap; /* Mozilla */
				white-space: -hp-pre-wrap;  /* HP Printers */
				word-wrap: break-word;      /* IE 5+ */
			}
			.container-redes .boxnetwork .footer-content{
				width: 100%;
				min-height: 60px;
				display: flex;
				flex-direction: row;
				align-items: center;
				justify-content: space-between;
				
			}
			.container-redes .boxnetwork .footer-content a{
				padding-left: 15px;
				padding-right: 15px;
			}

			.container-redes .boxnetwork .footer-content a{
				color: white;
				font-family: 'Open Sans', sans-serif;
				text-decoration: none;
				font-size: 13px;
				font-weight: 700;
				text-transform: uppercase;
			}

			@media all and (max-width: 768px) {
				.container-redes{
					flex-direction: column !important;
				}
				.container-redes .boxnetwork{
					margin-bottom: 30px;
					max-width: 100%;
				}
				.container-redes .boxnetwork:last-child{
					margin-bottom: 0px;
				}

				.container-redes .boxnetwork{
					width: 100%;
				}
			}

		</style>
	</head>
	<body>
		<div class="container-redes">
			<div class="boxnetwork twitter">
				<a href="https://twitter.com/<?= $userName; ?>" target="_new" class="title">
					<i class="fa fa-twitter" aria-hidden="true"></i> <span>@<?= $userName; ?></span>
				</a>
				<div class="content">
					<?php foreach ($data as $tweet) {
					?>
						<a href="https://twitter.com/<?= $userName; ?>/status/<?= $tweet->id; ?>" target="_new">
							<div class="tweet">
								<p><?= $tweet->text; ?> </p>

								<span class="date"><?= $tweet->created_at; ?></span>
							</div>
						</a>
					<?php } ?>
				</div>
				<div class="footer-content">
					<a href="https://twitter.com/<?= $userName; ?>" target="_new">Follow</a>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
			extract($_GET);

			if(isset($street_address))
			{
				
								$url = "http://maps.google.com/maps/api/geocode/xml?address=".$street_address.",".$city.",".$state;
								
								$xml = simplexml_load_file($url) or "Error: Cannot create object";
								if($xml->status=="ZERO_RESULTS")
								{
									echo "Bad search string, try again!";
								}
								else
								{
									$lat = $xml->result->geometry->location->lat;
									$lon = $xml->result->geometry->location->lng;
									if($temp=="cel"){
										$u="si";
										$d="C";
									}
									else{
										$u="us";
										$d="F";
									}
									$st="https://api.forecast.io/forecast/"."698d769933f0a79e31a8fdb172d7fa66"."/".$lat.",".$lon."?units=".$u.
						"&exclude=flags";
								}


						$contents = file_get_contents($st);
						echo $contents;
				
				}

	?>
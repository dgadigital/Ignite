<?php
/**
 * 	Template Name: Add cv
*/
get_header();

$hash = 'b94253bec084d37217eab789d5b79fc4';
$baseurl = 'https://ws.idibu.com/ws/rest/v1/applicants/add-cv';
if(isset($_GET['id'])) {
	//Build Query
	$id = $_GET['id'];
	$headers = array(
		'Accept: application/xml',
		'Content-Type: application/xml',
	);
	
	//Posted Variables
	$firstname = $_POST['firstName'];
	$lastname = $_POST['lastName'];
	$email = $_POST['email'];
	$uploaded = $_FILES['cv'];
	$details = $firstname.' '.$lastname;
		
	//Convert uploaded file
	if(isset($_FILES['cv'])) {
		function getExtension($str) {
				$i = strrpos($str,".");
				if (!$i) { return ""; }
				$l = strlen($str) - $i;
				$ext = substr($str,$i+1,$l);
				return $ext;
			}

			$fileName = $_FILES['cv']['name'];
			$tmpName  = $_FILES['cv']['tmp_name'];
			$fileSize = $_FILES['cv']['size'];
			$fileType = $_FILES['cv']['type'];
			$ext = getExtension($fileName);

			$convert = file_get_contents($_FILES['file']['tmp_name']);
			$convert = chunk_split(base64_encode(file_get_contents($tmpName)));
	}
	
	//Create XML
	/*$dom = new DOMDocument();
		$dom->encoding = 'utf-8';
		$dom->xmlVersion = '1.0';
		$dom->formatOutput = true;
		$xml_file_name = 'application.xml';		
		$root = $dom->createElement('idibu');
		
		$job_node = $dom->createElement('job');
		$child_node_jobid = $dom->createElement('id', $id);
		$job_node->appendChild($child_node_jobid);
		
		if(isset($_FILES['cv'])) {
			$cv_node = $dom->createElement('cv');
			$child_node_cvname = $dom->createElement('name', $fileName);
			$cv_node->appendChild($child_node_cvname);
			
			$child_node_cvcontents = $dom->createElement('contents', $convert);
			$cv_node->appendChild($child_node_cvcontents);
		}
		
		$email_node = $dom->createElement('email');
		$child_node_emailfrom = $dom->createElement('from', $email);
		$email_node->appendChild($child_node_emailfrom);
		$child_node_emailsubject = $dom->createElement('subject', $details);
		$email_node->appendChild($child_node_emailsubject);
		$child_node_emailbody = $dom->createElement('body', $details);
		$email_node->appendChild($child_node_emailbody);
		
		$root->appendChild($job_node);
		$root->appendChild($cv_node);
		$root->appendChild($email_node);
		$dom->appendChild($root);
		
		$dom->save($xml_file_name);
		$urlencodedDOM = urlencode($dom);
		echo $urlencodedDOM;*/
	
	$file = '<idibu><job><id>'.$id.'</id></job><cv><name>'.$details.'</name><contents>'.$convert.'</contents></cv><email><from>'.$email.'</from><subject>'.$details.' from Website</subject><body>'.$details.' from Website</body></email></idibu>';
	
	//Convert to URL-encoded within parameter
	//$datavariable = urlencode($file);

	//$url = $baseurl.'?hash='.$hash.'&data='.$datavariable;
	$url = $baseurl.'?hash='.$hash;
	$info = array (
		'hash' => $hash,
		'data' => $file
	);
	
    $datasend = http_build_query($info);

	//Query the job
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_URL, $url);
	//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 	curl_setopt($ch, CURLOPT_POST, TRUE);
     curl_setopt($ch,CURLOPT_POSTFIELDS, $datasend);
	$data = curl_exec($ch);
	curl_close($ch);

	$response = json_decode(json_encode(simplexml_load_string($data)), true);
	
	if($response['status'] == 'success'){
		//$redirect = 'https://www.igniteco.com';
		//header('Location: '.$redirect);
		echo '<h1>Application was successfully uploaded</h1>';
	}else{
		//Show Error message
		echo '<h1>Application upload Failed please contact us on 1300 481 179</h1>';
	}
	
}else{
	echo 'No Job';
}

print_r('<pre>');
print_r($response);
print_r('</pre>');

echo 'Status:'.$response['status'];

print_r('<pre>');
print_r($info);
print_r('</pre>');
 get_footer();
?>

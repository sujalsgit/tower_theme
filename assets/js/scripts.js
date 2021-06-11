// api url
const api_url =
	"https://staging.8bitbyte.co.nz/tower/wp-json/v2/policies?v";

// Defining async function
async function getapi(url) {
	
	// Storing response
	const response = await fetch(url);
	
	// Storing data in form of JSON
	var data = await response.json();
	console.log(data);

	//console.log(data);
	if (response) {
		hideloader();
	}
	show(data);
}
// Calling that async function
getapi(api_url);

// Function to hide the loader
function hideloader() {
	document.getElementById('loading').style.display = 'none';
}
// Function to define innerHTML for HTML table
function show(data) {
	let tab =
		`<tr>
		<th>Policy ID</th>
        	<th>Policy Name</th>
		<th>Live Date</th>
        	<th>Description</th>
		</tr>`;
	
	// Loop to access all rows
	for (let key of Object.keys(data)) {
  		//console.log(`${key}: ${data[key]}`);
		  var r = data[key];
		  tab += `<tr>
			<td>${r.policy_id} </td>
			<td>${r.title}</td>
			<td>${r.live_date}</td>
			<td>${r.description}</td>		
		</tr>`;
	}
	// Setting innerHTML as tab variable
	document.getElementById("policies").innerHTML = tab;
}

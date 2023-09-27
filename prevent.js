const form = document.querySelector("form");

async function postData(url = "", data = {}) 
{
	const response = await fetch("http://localhost/praksaprojekat" + url, 
    {
		method: "POST",
		headers: {
			"Content-Type": "application/json",
		},
		body: JSON.stringify(data),
	});
	if (!response.ok)
    {
		throw new Error("Network response was not OK");
	}

	return response.json();
}

form.addEventListener("submit", (e) => 
{
	e.preventDefault();
	console.log("prevented");

	const formInputs = form.querySelectorAll(".field");
	let formData = {};
	for (let input of formInputs) 
    {
		formData[input.name] = input.value;
	}


	postData("/create.php", formData)
		.then((data) => 
        {
		    const ul = document.querySelector("#ul");

			ul.appendChild(data);

			console.log(data);
		})

		.catch((err) => 
        {
			console.error(err);
		})
		.finally(() => 
        {
			console.log("always called");
		});
});
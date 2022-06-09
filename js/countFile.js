(async (document, window, index) => {
	var inputs = document.querySelectorAll(".fileToUpload");
	Array.prototype.forEach.call(inputs, (input) => {
		var label = input.nextElementSibling,
         labelVal = label.innerHTML;

		input.addEventListener("change", (e) => {
			var fileName = "";
            let files = e.target.files.length;
            let uploadButton = document.getElementById("submit-button");
            uploadButton.removeAttribute("disabled");
            
			if (files && files > 1) {
                fileName = (e.target.getAttribute("data-multiple-caption") || "").replace("{count}", files);
            } else {
                fileName = e.target.value.split("\\").pop();
                let extenstion = fileName.split(".").length > 0 ? "." + fileName.split(".")[1] : "";
                fileName = fileName.substring(0, fileName.length / 2) + extenstion;
            }

			if(fileName) {
                label.querySelector("span").innerHTML = fileName;
                label.style.width = "fit-content";
            }

			else
				label.innerHTML = labelVal;
		});

		input.addEventListener("focus", () => { input.classList.add("has-focus"); });
		input.addEventListener("blur", () => { input.classList.remove("has-focus"); });
	});
})(document, window, 0);
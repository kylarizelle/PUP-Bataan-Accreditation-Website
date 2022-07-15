		let menuOpenbtn = document.querySelector(".navbar .fa-bars");
		let menuClosebtn = document.querySelector(".nav-links .fa-times");
		let navLinks = document.querySelector(".nav-links");
		let aboutArrow = document.querySelector(".about-arrow");
		let about = document.querySelector(".about");
		let search_btn = document.querySelector(".fa-search");
		let container = document.querySelector(".container");
		let arrow_left = document.querySelector(".container .fa-arrow-left");
		let programsArrow =document.querySelector(".programs-arrow");
		let exhibitArrow =document.querySelector(".exhibit-arrow");
		let estik = document.querySelector(".sticky");

		menuOpenbtn.addEventListener("click", ()=>{
			navLinks.style.left = "0";
			search_btn.style.right= "-30px";

		});

		menuClosebtn.addEventListener("click",()=>{
			navLinks.style.left = "100%";
			search_btn.style.right = "30px";
		});

			window.onscroll = function() {
			myFunction()
		}
		var header =document.getElementById("header");
		var sticky=header.offsetTop;

		function myFunction() {
			if (window.pageYOffset > sticky) {
				header.classList.add("sticky");
			} else {
				header.classList.remove("sticky");
			}
		}

		search_btn.addEventListener("click", ()=> {
			container.style.right = "-1360px";
			container.style.left = "0px";
		});

		arrow_left.addEventListener("click", ()=> {
			container.style.left = "1460px";
			container.style.right="0px";
		});

		aboutArrow.addEventListener("click", ()=> {
		navLinks.classList.toggle("show1");
		});

		programsArrow.addEventListener("click", ()=> {
			navLinks.classList.toggle("show2");
		});

		exhibitArrow.addEventListener("click", ()=> {
			navLinks.classList.toggle("show3");
		});

		const currentlocation = location.href;
		const menuItem = document.querySelectorAll('a');
		const menuLength = menuItem.length;

		// for (let i = 0; i<menuLength; i++) {
		// 	if(menuItem[i].href === currentlocation) {
		// 		menuItem[i].className = "active"
		// 	}
		// }

		var counter = 1;
		setInterval(function(){
			document.getElementById('radio' + counter).checked = true;
			counter++;
			if (counter > 3) {
				counter = 1;
			}
		}, 5000);
		
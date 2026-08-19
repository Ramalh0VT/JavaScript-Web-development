import Image from "next/image";
import styles from "./page.module.css";


export default function Home() {
  return (
	<>
		
			<header className="header"><img src="images/tier.jpeg" width ="100"></img> <a href="nil">What we do</a> <a href="nil">Blog</a><a href="nil">Podcast</a><a href="nil"> Careers</a> <div className="button_cont"><button className="button"> Work with us</button></div></header>
		

	  <div className="container">
	  
	  	<h1>Unlock your business potential with faceboook & Instagram advertising</h1>
	  	<p>Facebook Premier level partner agency</p>
	 	<button> Work with us</button>
	  </div>

	  <footer>
		<div><img src = "nil" alt="imagem"></img><p>Facebook premier</p><p>Level agency partner</p></div>
		<div><img src = "nil" alt="imagem"></img><p></p></div>
		<div><img src = "nil" alt="imagem"></img><p></p></div>
		<div><img src = "nil" alt="imagem"></img><p></p></div>
		<div><img src = "nil" alt="imagem"></img><p></p></div>
		<div><img src = "nil" alt="imagem"></img><p></p></div>
	  </footer>
	</>
  );
}

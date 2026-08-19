import nf_deco from "../components/404_deco.jsx"



export default function notFound(){
	return <>
		<html>
		<body>
		<div className="container-notfound">
			<div className="flex-notfound">
				<h2>ERRO 404</h2>
				<p>Página não encontrada</p>
			</div>
			<nf_deco>
			</nf_deco>
		</div>
		</body>
		</html>
	</>
}

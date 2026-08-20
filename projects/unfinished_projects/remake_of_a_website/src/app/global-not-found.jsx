import NfDeco from "../components/404_deco.jsx";

export default function NotFound() {
	return (
		<html>
			<body>
				<div className="container-notfound">
					<div className="flex-notfound">
						<h2>ERRO 404</h2>
						<p>Página não encontrada</p>
					</div>
					<NfDeco />
				</div>
			</body>
		</html>
	);
}

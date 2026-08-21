import "../globals.css";
import Image from "next/image";

export default function QuienesSomos() {
	return (
		<div className="cont_simples">
			<h1>¿Quiénes somos?</h1>
			<p>Somos una compañía que solo existe en la cabeza del desarrollador de software Gustavo Ramalho da Silva</p>

			<p>Aquí hay una imagen de un pez:</p>
			<Image
				src="/images/pez.jpg"
				width={250}
				height={250}
				alt="imagen de un pez que quería cargar por alguna razón"
			/>
		</div>
	);
}

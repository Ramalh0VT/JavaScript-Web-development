import Link from "next/link";
import "./header.css";

export default function Header() {
	return (
		<header>
			<p><Link href="/sobre">Sobre</Link></p>
			<p><Link href="/ayuda">Ayuda</Link></p>
			<p><Link href="/quienessomos">Quiénes somos</Link></p>
		</header>
	);
}

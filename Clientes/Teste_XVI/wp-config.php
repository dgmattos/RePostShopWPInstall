<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'Teste_XVI');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'del1202');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '0UC^<kLC0mUH6Em-:?f(N uspc zeQ=U!y24a9~35bBoT3/ezz;A/e3!8XYyec4k');
define('SECURE_AUTH_KEY',  'sDHf(toU8w_A]bEBh#&Q.^o ,,}V:%avgE$|vD_1d,2K=)6t*k!X.m<HQ&8i@:*U');
define('LOGGED_IN_KEY',    'aKq1U(TNUv6qZsE[8L7CKe)sGSU;Y8W 7AGj-1vK2BDBx^/4Wr}bB,: /* _H<6J');
define('NONCE_KEY',        '?_1uDBi qyWac+ZW-OHf*FsdHr.MF^v[+`rSCRW:IEL:XnhQCP|.wmG0;J:p5J%J');
define('AUTH_SALT',        '6H{;j<Pf/>4,4Q{-Bz`2WtsM,+drT(f7YgSU_#`)`l8P;ij&Ll9<1g(22kfy7^Ot');
define('SECURE_AUTH_SALT', '_qbFDdH0-.7L%)ekF{hXV5v#4CzzZO3mN:DK]}}j1o!.U`) H~9&04<f8i7WZ<ut');
define('LOGGED_IN_SALT',   'OtKy9]Vb%S:^=J3e-0t)fWeoWN.V~RKKu Cu5uE`qk]g2-vr[pNEhGV>pmtf6p$-');
define('NONCE_SALT',       '64@7Lxo=GP?Q@#/07a_PcTUD#?#AoN4vcg<oa*1x&Kx@L,i=u}[~?/J#BOrP9R^@');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'WP_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');

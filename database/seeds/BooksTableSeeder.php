<?php

use App\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // inserts comentados já inseridos
        // Book::insert([
        //     'title'       => 'Alguma poesia',
        //     'genre'       => 'Poesia',
        //     'description' => 'Publicado em 1930, numa pequena tiragem não comercial de apenas quinhentos exemplares - sob os auspícios de uma certa edições Pindorama, pura ficção jocosa -, Alguma poesia assinala a estreia de um autor que, então com 28 anos, iria revolucionar a poesia de língua portuguesa no século XX. Não é para menos. Com peças como “Poema de sete faces”, “Infância”, “No meio do caminho”, “O sobrevivente”, entre tantos outros textos decisivos, o livro demonstra já a enorme maturidade do jovem Drummond, ainda estabelecido em Belo Horizonte. Dois anos antes, Drummond havia causado escândalo entre as hostes literárias ao publicar, na Revista de Antropofagia, o poema “No meio do caminho”. Era o início da carreira de escândalo do poema, reconstruída na década de 1960 pelo próprio autor em um livro que reuniria os ataques, as paródias e as contendas relacionadas ao poema. Mas para além da polêmica, Alguma poesia já apresenta aquilo de melhor que Carlos Drummond de Andrade iria oferecer ao longo de quase 60 anos de uma das carreiras mais fecundas da literatura moderna: o lirismo, o humor, o tom meditativo e irônico, a observação desencantada dos fatos, o sensualismo, a reflexão aguda sobre o amor e a morte. Contando com um posfácio do poeta e crítico Eucanaã Ferraz, um dos grandes intérpretes da obra drummondiana nos tempos atuais, esta edição de Alguma poesia, com texto estabelecido e caderno de imagens, é uma nova - e extraordinária - oportunidade para o leitor brasileiro entrar em contato com um de seus grandes autores. E é uma promessa de reencontro para todos aqueles que desejam ler alguns dos mais emblemáticos poetas da nossa literatura.',
        //     'sale_price'  => 33.99
        // ]);
        // Book::insert([
        //     'title'       => 'O diário de Anne Frank',
        //     'genre'       => 'Não Ficção',
        //     'description' => 'O Diário de Anne Frank teve a autenticidade confirmada por peritos. Estudos forenses da caligrafia de Anne e exame do papel do diário, da tinta e da cola comprovaram ser de material existente na época. A conclusão foi oficialmente apresentada pelo Instituto Estatal Holandês para Documentação da Guerra.',
        //     'sale_price'  => 13.92
        // ]);
        // Book::insert([
        //     'title'       => 'O sol é para todos',
        //     'genre'       => 'Romance',
        //     'description' => 'Um dos maiores clássicos da literatura mundial.Nesta emocionante história ambientada no Sul dos Estados Unidos da década de 1930, região envenenada pela violência do preconceito racial, vemos um mundo de grande beleza e ferozes desigualdades através dos olhos de uma menina de inteligência viva e questionadora, enquanto seu pai, um advogado local, arrisca tudo para defender um homem negro injustamente acusado de cometer um terrível crime.Uma história sobre raça e classe, inocência e justiça, hipocrisia e heroísmo, tradição e transformação, O sol é para todos permanece tão importante hoje quanto foi em sua primeira edição, em 1960, durante os anos turbulentos da luta pelos direitos civis dos negros nos Estados Unidos.Considerado um dos romances norte-americanos mais importantes do século XX, O sol é para todos surpreende pela atualidade de seu enredo e estilo.',
        //     'sale_price'  => 47.89
        // ]);
        // Book::insert([
        //     'title'       => 'O pequeno príncipe',
        //     'genre'       => 'Fantasia',
        //     'description' => 'Nesta clássica história que marcou gerações de leitores em todo o mundo, um piloto cai com seu avião no deserto do Saara e encontra um pequeno príncipe, que o leva a uma jornada filosófica e poética através de planetas que encerram a solidão humana. A edição conta com a clássica tradução do poeta imortal dom Marcos Barbosa, e é a versão mais consagrada da obra, publicada no Brasil desde 1952.',
        //     'sale_price'  => 11.90
        // ]);
        // Book::insert([
        //     'title'       => 'O morro dos ventos uivantes',
        //     'genre'       => 'Ficção',
        //     'description' => 'Único romance da escritora inglesa Emily Bronte, O morro dos ventos uivantes retrata uma trágica historia de amor e obsessão em que os personagens principais são a obstinada e geniosa Catherine Earnshaw e seu irmão adotivo, Heathcliff. Grosseiro, humilhado e rejeitado, ele guarda apenas rancor no coração, mas tem com Catherine um relaciona- mento marcado por amor e, ao mesmo tempo, ódio. Essa ligação perdura mesmo com o casamento de Catherine com Edgar Linton.',
        //     'sale_price'  => 29.92
        // ]);
        // Book::insert([
        //     'title'       => 'Breves respostas para grandes questões',
        //     'genre'       => 'Ciências',
        //     'description' => 'Desde Einstein, o mundo não via um cientista tão reverenciado quanto Stephen Hawking. Com seu trabalho revolucionário em física e cosmologia, ele encantou milhões de leitores com a origem do universo e a natureza dos buracos negros, além de inspirar todos pela coragem e determinação que mostrou em sua luta contra a doença do neurônio motor. Agora, nesta reunião póstuma de seus trabalhos, podemos conhecer seus pensamentos a respeito das grandes questões que povoam nossas mentes desde os primórdios e daquelas mais prementes na atualidade. Somos conduzidos assim a suas reflexões sobre a origem do universo, a existência de Deus e a natureza do tempo, assuntos sempre submetidos a seu intelecto afiado de cientista. Aliado à curiosidade que o impulsionou por toda a vida, ele projeta seu olhar também para o futuro, buscando soluções para problemas que ameaçam hoje o mundo como o conhecemos, tais como o aquecimento global, a fome e a urgência de um desenvolvimento sustentável. Com prefácio de Eddie Redmayne — que ganhou o Oscar por interpretar Hawking no cinema —, introdução do Nobel de física Kip Thorne e posfácio comovente de Lucy Hawking, sua filha, Breves respostas para grandes questões não é apenas a última mensagem de um grande gênio: é seu presente final para a humanidade.',
        //     'sale_price'  => 29.62
        // ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Logger;
use App\Models\Bomba;
use App\Models\User;
use App\Models\Empresas;
use App\Models\Gestor;
use App\Models\Session;
use App\Models\Mensagem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fotify\PasswordValidationRules;

class BombaController extends Controller
{

    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger();
    }
    // Metodo de restauracao
    /*
    public function restore($post) // Leia os comentários do final
    {
        // Encontre entre os excluidos o post de id = ao passado
        $post = Post::onlyThrashed()->where([
            'id' => $post
        ]);
        // Restaure o post
        $post->restore();
    }

*/

    public function dashboard(){
        
        $bomba = Bomba::all();
        $mensagem = Mensagem::all();
        $usuarios = User::all();
        
        $user = auth()->user();
        $acess =  $user->acesso_id;
        $totbomba = count(Bomba::all());
        $totsession = count(Session::all());
        $totaluser = count(User::all());
        $totalmsg = count(Mensagem::all());
        return view('bomb.dashboard', ['bomba' => $bomba, 'mensagem' => $mensagem, 'usuarios' => $usuarios,'totalmsg' => $totalmsg,'acess' => $acess, 'totbomba' => $totbomba, 'totsession' => $totsession, 'totaluser' => $totaluser]);
    }

    
    /**Página Principal */
    public function index(){
        $totalbomba = count(Bomba::all());
        $totaluser = count(User::all());
        $totalempresa = count(Empresas::all());
        return view('welcome', ['totalbomba' => $totalbomba, 'totaluser' => $totaluser, 'totalempresa' => $totalempresa]);
    }
    
    public function about(){
        $totalbomba = count(Bomba::all());
        $totaluser = count(User::all());
        $totalempresa = count(Empresas::all());
        return view('about', ['totalbomba' => $totalbomba, 'totaluser' => $totaluser, 'totalempresa' => $totalempresa]);
    }

    public function createbomba(){
        return view('bomb.createbomba');
    }


/** ======================Acções do Postos de Combustível ================*/

    public function posto(){
        /**Pesquisando bombas de combustível */
        $search = request('search');
        if ($search) {
            $bomba = Bomba::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        }else {
            $bomba = Bomba::all();
        }
        $totalmsg = count(Mensagem::all());
        $mensagem = Mensagem::all();
        $usuarios = User::all();
        $empresa = Empresas::all();
        return view('bomb.posto', ['empresa' => $empresa,'bomba' => $bomba, 'usuarios' => $usuarios, 'search' => $search, 'totalmsg' => $totalmsg, 'mensagem' => $mensagem ]);
    }

    /** Excluir um posto de Combustível */
    public function destroy($id){

        Bomba::findOrFail($id)->delete();
        // Loggers info('Foi deletado um Posto');
        return redirect('/bomb/posto')->with('msg','Posto removido com sucesso!');
    }
/** Atualizar um posto de Combustível */
    public function edit($id){

    $bomb = Bomba::findOrFail($id);
    $totalmsg = count(Mensagem::all());
    $mensagem = Mensagem::all();
    $usuarios = User::all();
    return view('bomb.edit', ['bomb' => $bomb, 'totalmsg' => $totalmsg, 'mensagem' => $mensagem, 'usuarios' => $usuarios]);
    }  

    /** Atualizar o combustível de um posto de Combustível */
    public function fuel(Request $request){
        if (isset($request->btna)) {
            DB::insert('update bombas set gas=? where id=?',[$request->btna, $request->id]);
        }elseif (isset($request->btnb)) {
            DB::insert('update bombas set gas=? where id=?',[$request->btnb, $request->id]);
        }elseif (isset($request->btnc)) {
            DB::insert('update bombas set gol=? where id=?',[$request->btnc, $request->id]);
        }elseif (isset($request->btnd)) {
            DB::insert('update bombas set gol=? where id=?',[$request->btnd, $request->id]);
        }
        return redirect('/bomb/posto')->with('msg','Combustível atualizado com sucesso!');
        }  

    public function update(Request $request){
        Bomba::findOrFail($request->id)->update($request->all());
        // Loggers info('Foi Atualizado um Posto');
        return redirect('/bomb/posto')->with('msg','Posto atualizado com sucesso!');
        
    }
/**================================================================================== */

/* Estatistica */

public function statistic(){
    $empresa = Empresas::all();
    $totalmsg = count(Mensagem::all());
    $mensagem = Mensagem::all();
    $usuarios = User::all();

    //Gráfico de Usuários
    $userData = User::select([
        DB::raw('YEAR(created_at) as ano'),
        DB::raw('COUNT(*) as total')
    ])
    ->groupBy('ano')
    ->orderBy('ano', 'asc')
    ->get();

    //Preparar Arrays
    foreach ($userData as $user) {
        $ano[] = $user->ano;
        $total[] = $user->total;
    }

    //Formatar para o chart
    $userLabel = "'Usuários'";
    $userAno = implode(',',$ano);
    $userTotal = implode(',',$total);

    //Graficos de Postos
    $empresaData = Empresas::all();

    //Preparar Array
    foreach ($empresaData as $empresas) {
        $empresasNome[] = "'".$empresas->nome."'";
        $empresasTotal[] = Bomba::where('empresas_id', $empresas->id)->count();
    }

    //Formatar para as charts
    $empresasLabel = implode(',',$empresasNome);
    $empresasTotal = implode(',',$empresasTotal);

    return view('/bomb/statistic', compact('empresa','totalmsg','mensagem','usuarios','userLabel','userAno','userTotal','empresasLabel','empresasTotal'));
}

/* Mensagem */
public function mensagem(){
    $mensagem = Mensagem::all();
    $usuarios = User::all();
    $totalmsg = count(Mensagem::all());
    $mensagem = Mensagem::all();

    return view('/bomb/mensagem', ['mensagem' => $mensagem, 'usuarios' => $usuarios, 'totalmsg' => $totalmsg, 'mensagem' => $mensagem]);
}

/* Logs de atividades */
public function logs(){
    $totalmsg = count(Mensagem::all());
    $mensagem = Mensagem::all();
    $usuarios = User::all();
    return view('/bomb/log',[ 'totalmsg' => $totalmsg, 'mensagem' => $mensagem, 'usuarios' => $usuarios]);
}

/* Store dos postos de combustiveis */
public function store(Request $request){
    
    $bomba = new Bomba;

    $bomba->nome = $request->nome;
    $bomba->endereco = $request->endereco;
    if (isset($request->contacto)) {
        $bomba->contacto = $request->contacto;
    }else {
        $bomba->contacto = NULL;
    }
    $bomba->abertura = $request->abertura;
    $bomba->fechamento = $request->fechamento;
    
    $bomba->lat = $request->lat;
    $bomba->lng = $request->lng;

    $bomba->gas = $request->gas;
    $bomba->gol = $request->gol;

    $user = auth()->user();
    $bomba->empresas_id = $user->empresas_id;
    $bomba->user_id = $user->id;

    $bomba->save();     
    // Loggers info('Foi cadastrado um Posto');
    return redirect('/bomb/posto')->with('msg','Posto cadastrado com sucesso!');
}

/**================================================================================== */


/** ======================Acções para o usuário=========== */
    public function userlogado(){
        $usuarios = User::all();
        $totalmsg = count(Mensagem::all());
        $mensagem = Mensagem::all();
        
        return view('adminfolder.userfolder.userlogado', ['usuarios' => $usuarios, 'totalmsg' => $totalmsg, 'mensagem' => $mensagem]);
    }

    /** Excluir um usuário */
    public function destroyuser($id){
        User::findOrFail($id)->delete();
        $this->Logger->log('info','Foi deletado um Usuario');
        //Loggers info('Foi deletado um Usuario');
        return redirect('/adminfolder/userfolder/userlogado')->with('msg','Usuário removido com sucesso!');
    }


/** ======================Acções da empresas ================*/

        /** Excluir um empresa */
        public function destroyempresa($id){

            Empresas::findOrFail($id)->delete();
            // Loggers info('Foi deletado uma empresa');
            return redirect('/adminfolder/empresafolder/empresas')->with('msg','Empresa removido com sucesso!');
        }
    /** Atualizar um empresa */
    public function editempresa($id){

    $empresa = Empresas::findOrFail($id);
    $totalmsg = count(Mensagem::all());
    $mensagem = Mensagem::all();
    $usuarios = User::all();
    return view('adminfolder.empresafolder.editempresa', ['empresa' => $empresa, 'totalmsg' => $totalmsg, 'mensagem' => $mensagem, 'usuarios' => $usuarios]);
    }  

    /** Atualizar um empresa */
    public function updateempresa(Request $request){
        Empresas::findOrFail($request->id)->update($request->all());
        // Loggers info('Foi Atualizado uma Empresa');
        return redirect('/adminfolder/empresafolder/empresas')->with('msg','Empresa atualizado com sucesso!');
    }


    public function empresa(){
        $empresa = Empresas::all();
        $totalmsg = count(Mensagem::all());
        $mensagem = Mensagem::all();
        $usuarios = User::all();
        return view('adminfolder.empresafolder.empresas', ['empresa' => $empresa, 'totalmsg' => $totalmsg, 'mensagem' => $mensagem, 'usuarios' => $usuarios]);
    }

    public function createempresa(){
        $totalmsg = count(Mensagem::all());
        $mensagem = Mensagem::all();
        $usuarios = User::all();
        return view('adminfolder.empresafolder.createempresa',[ 'totalmsg' => $totalmsg, 'mensagem' => $mensagem, 'usuarios' => $usuarios]);
    }

    public function storeempresa(Request $request){
        $empresa = new Empresas;
        $empresa->nome = $request->nome;
        $empresa->nif = $request->nif;
        $empresa->save();     
        $this->Logger->log('info','Cadastrou uma empresa', auth()->user());
        // Loggers info('Foi Cadastrado uma Empresa');
        return redirect('/adminfolder/empresafolder/empresas')->with('msg','Empresa cadastrado com sucesso!');
    }

    /** ======================Acções do gestor ================*/

        /** Excluir um gestor */
        public function destroygestor($id){

            User::findOrFail($id)->delete();
            // Loggers info('Foi deletado um Gestor');
            return redirect('/adminfolder/gestorfolder/gestor')->with('msg','Gestor removido com sucesso!');
        }
    /** Atualizar um gestor */
    public function editgestor($id){

    $gestor = User::findOrFail($id);
    $totalmsg = count(Mensagem::all());
    $mensagem = Mensagem::all();
    $usuarios = User::all();
    $empresa = Empresas::all(); 
    return view('adminfolder.gestorfolder.editgestor', ['empresa' => $empresa, 'gestor' => $gestor, 'totalmsg' => $totalmsg, 'mensagem' => $mensagem, 'usuarios' => $usuarios]);
    }  

    /** Atualizar um gestor */
    public function updategestor(Request $request){
        User::findOrFail($request->id);
        $nome = $request->nome;
        $email = $request->email;
        $password = Hash::make($request->password);
        $empresas_id = $request->select;

        DB::update('update users set name = ?, password = ?, updated_at = ?, empresas_id = ? where id = ?', [ $nome, $password, date('Y-m-d H:i:s.u'), $empresas_id, $request->id]);
        // Loggers info('Foi Atualizado um Gestor');
        return redirect('/adminfolder/gestorfolder/gestor')->with('msg','Gestor atualizado com sucesso!');
    }

    public function gestor(){
        $usuarios = User::all();
        $empresa = Empresas::all();
        $totalmsg = count(Mensagem::all());
        $mensagem = Mensagem::all();
        return view('adminfolder.gestorfolder.gestor', ['empresa' => $empresa, 'usuarios' => $usuarios, 'totalmsg' => $totalmsg, 'mensagem' => $mensagem]);
    }

    public function creategestor(){
        $empresa = Empresas::all();
        $totalmsg = count(Mensagem::all());
        $mensagem = Mensagem::all();
        $usuarios = User::all();
        return view('adminfolder.gestorfolder.creategestor', ['empresa' => $empresa, 'totalmsg' => $totalmsg, 'mensagem' => $mensagem, 'usuarios' => $usuarios]);
    }

    public function storegestor(Request $request){
    
        if ($request->password == $request->confirmPassword ) {
            $nome = $request->nome;
            $username = $request->username;
            $email = $request->email;
            $password = Hash::make($request->password);
            $acesso_id = 3;
            $empresas_id = $request->select;
            DB::insert('insert into users (name, username, email, password, created_at, acesso_id, empresas_id) values (?,?,?,?,?,?,?)', [ $nome, $username, $email, $password, date('Y-m-d H:i:s.u'), $acesso_id, $empresas_id]);
            // Loggers info('Foi Criado um Gestor');
            return redirect('/adminfolder/gestorfolder/gestor')->with('msg','Gestor cadastrado com sucesso!');
        }else{
            $cor = "alert alert-danger alert-dismissible fade show";
            return redirect('/adminfolder/gestorfolder/creategestor')->with('msg','As senhas não coencidem!');
        }
        

        
    }        
    
    /** ====================== Acções do Usuario ================*/
    public function mensage(){
        
        return view('userdir.mensagem');
    }

    public function msgvisita(){
        
        return view('msgvisita');
    }

    public function storemensagem(Request $request){
        $conteudo = $request->messages;
        $user = auth()->user();
        $usermensage_id = $user->id;
        $nome = $user->nome;
        $email = $user->email;

        DB::insert('insert into mensagems (nome, email, conteudo, user_id) values (?,?,?,?)', [$nome, $email, $conteudo, $usermensage_id]);
        // Loggers info('Foi Criado um Gestor');
        return redirect('/userdir/mensagem')->with('msg','Notificado com sucesso!');
    }  
    
    public function createmensagem(Request $request){
        $nome = $request->nome;
        $email = $request->email;
        $conteudo = $request->messages;
        DB::insert('insert into mensagems (nome, email, conteudo) values (?,?,?)', [$nome, $email, $conteudo]);
        return redirect('/msgvisita')->with('msg','Notificado com sucesso!');
    }

/** Download PDF */

public function imprimir()
{
    $bomba = Bomba::all();
    $totalmsg = count(Mensagem::all());
    $mensagem = Mensagem::all();
    $usuarios = User::all();
    $empresa = Empresas::all();
 
    return \PDF::loadView('bomb.posto', compact('bomba','totalmsg','mensagem','usuarios','empresa'))
                // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                // Se quiser que faça download: ->download('name.pdf')
                ->setPaper('a4', 'landscape')
                ->stream('postos'.time().'.pdf');
}

}


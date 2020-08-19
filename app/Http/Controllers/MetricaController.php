<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SolucionTotal\APIGit\API;
use App\Models\Issue;
use App\Models\Branch;
use App\Models\Commit;
use Cz\Git\GitRepository;
use Illuminate\Support\Facades\Storage;

class MetricaController extends Controller
{

    public function index(Request $request)
    {
       /* set_time_limit(100000);
        $api = new API($request->nick, $request->pass);
        $pagina = 1; $numero = 1; 
        do { 
        $branches = $api->getBranches($request->nick, $request->linkgit, $pagina); 
        foreach($branches as $branch){ 
            $branch1 = new Branch;
            $branch1->name = $branch->name;
            $branch1->repositorio_id = $request->repo_id;
            $branch1->save();
            $commits = $api->getCommits($request->nick, $request->linkgit, $branch->commit->sha );
            foreach($commits as $commit){
                $commit1 = $api->getCommit($request->nick, $request->linkgit, $commit->sha);
                $commit2 = new Commit;
                if(isset($commit1->author->login))
                { $commit2->author = $commit1->author->login; 
                }else
                { $commit2->author = 'Desconocido'; 
                    }
                if(isset($commit1->message))
                { $commit2->description = $commit1->message; 
                }else
                { $commit2->description = 'No tiene comentario'; 
                    }
                               
                $commit2->additions = $commit1->stats->additions;
                $commit2->deletions = $commit1->stats->deletions;
                $commit2->total = $commit1->stats->total;
                $commit2->date = 'Sin fecha actualmente';
                $commit2->branch_id = $branch1->id;
                $commit2->save();
                }
            $numero++;}
            
            $pagina++;}
        while (!empty($branches)); */

        $repo = GitRepository::cloneRepository('https://github.com/'.$request->nick.'/'.$request->linkgit.'.git');

        $resultado = shell_exec('git -C ./'.$request->linkgit.' log --pretty=format:"[%h] %an %ad %s" --date=short --numstat --before=2018-11-01 > testLS2.log');
        $resultado2 = shell_exec('java -jar code-maat-0.8.5-standalone.jar maat -l testLS2.log -c git -a summary > test.log');
        $resultado3 = shell_exec('perl cloc ./'.$request->linkgit.' --by-file --csv --quiet --report-file=hib_lines.csv');
        $resultado4 = shell_exec('java -jar code-maat-0.8.5-standalone.jar maat -l testLS2.log -c git -a revisions > hib_freqs.csv');
        $resultado5 = shell_exec('python scripts/merge_comp_freqs.py hib_freqs.csv hib_lines.csv > Prueba.csv');
        Storage::deleteDirectory('/storage/app/public/'.$request->linkgit);

   
         

        return response()->json(['msg' => 'ok']);

    }
    public function clonar(Request $request)
    {
        
       return view('metricas.clone');
    }

    
}

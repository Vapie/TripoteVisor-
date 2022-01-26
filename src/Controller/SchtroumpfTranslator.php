<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SchtroumpfTranslator extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $string = "";

        $array = explode(" ", $string);
        $currentIndex = 0;
        $subjectSingularList = ["je", "il", "elle", "l'on", "qu'il", "qu'elle", "qu'on"];
        $subjectPlurialList = ["ils", "elles", "qu'ils", "qu'elles"];
        $subjectAuxiliarList = ["avoir", "suis", "été", "fait", "est", "de", "pour", "ayant", "j'ai", "en", "peux", "peut", "veux", "veut"];

        foreach($array as $word){
            $word = strtolower($word);
            if (in_array($word, $subjectSingularList)){
                $array[$currentIndex+1] = "schtroumpf";
            }
            else if (in_array($word, $subjectPlurialList)){
                $array[$currentIndex+1] = "schtroumpfent";
            }
            else if (in_array($word, $subjectAuxiliarList)){
                if(str_ends_with($array[$currentIndex+1], 'é') or str_ends_with($array[$currentIndex+1], 'is')){
                    $array[$currentIndex+1] = "schtroumpfé";
                }
                else if(str_ends_with($array[$currentIndex+1], 'és')){
                    $array[$currentIndex+1] = "schtroumpfés";
                }
                else if(str_ends_with($array[$currentIndex+1], 'ée')){
                    $array[$currentIndex+1] = "schtroumpfée";
                }
                else if(str_ends_with($array[$currentIndex+1], 'ées')){
                    $array[$currentIndex+1] = "schtroumpfées";
                }
                else if(str_ends_with($array[$currentIndex+1], 'er') or str_ends_with($array[$currentIndex+1], 'ir') or str_ends_with($array[$currentIndex+1], 'dre') or str_ends_with($array[$currentIndex+1], 'tre')){
                    $array[$currentIndex+1] = "schtroumpfer";
                }
                else if(str_ends_with($array[$currentIndex+1], 'ant')){
                    $array[$currentIndex+1] = "schtroumpfant";
                }   
            }
            else if (str_starts_with($word, "d'")and str_ends_with($word, 'er') or str_starts_with($word, "d'") and str_ends_with($word, 'ir') or str_ends_with($word, 'tre')){
                $word = "de schtroumpfer";
            }
            else if (str_starts_with($word, "s'")and str_ends_with($word, 'er')){
                $word = "se schtroumpfer";
            }
            else if($word == "nous"){
                $array[$currentIndex+1] = "schtroumpfons";
            }
            else if($word == "vous"){
                $array[$currentIndex+1] = "schtroumpfez";
            }
            else if(str_ends_with($word, 'er') or str_ends_with($word, 'ir') or str_ends_with($word, 'dre') or str_ends_with($word, 'tre')){
                $word = "schtroumpfer";
            }
            else if(str_ends_with($word, 'ant') and $word != "ayant"){
                $word = "schtroumpfant";
            } 
            
            $currentIndex ++;
        }
        print_r(implode(" ", $array));
        
        return new Response();
    }
}


<?php


namespace App;

    use App\Entity\Review;
    use App\Entity\Schtroumpf;
    use App\Entity\SchtroumpfJob;
    use App\Entity\User;
    use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

    use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class CustomVoter extends Voter
{
    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {

       if ($attribute == "create_review"){
           $user = $token->getUser();

           if (!$user instanceof User) {
               // the user must be logged in; if not, deny access
               return false;
           }


           /** @var Review $review */
           $review = $subject;

           foreach ($review->getSchtroumpf()->getSchtroumpfJobs() as $job){
                if ($job->getUser() == $user){
//                   dd("yo");
                    return true;
                }
           }
           dd($review);
//        foreach ($schtroumpf->getSchtroumpfJobs() as $value) {
//            /** @var SchtroumpfJob $job */
//            $job = $value;
//            if ($job . $user == $user) {
//                return true;
//            }
//        }
       }

        return false;

    }

    protected function supports(string $attribute, mixed $subject): bool
    {

        // if the attribute isn't one we support, return false
        if (!in_array($attribute, ["contains_sch","edit_review","create_review","edit_schtroumpf","create_schtroumpf"])) {
            return false;
        }


        return true;

    }
}


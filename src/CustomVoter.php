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
        //TODO

       if ($attribute == "create_review"){
           $user = $token->getUser();
           if (!$user instanceof User) {
               // the user must be logged in; if not, deny access
               return false;
           }

           /** @var Review $review */
           $review = $subject;

           foreach ($review->getSchtroumpf()->getSchtroumpfJobs() as $job){

                if ($job->getUser() == $user and ($job->getRole() == "ADMIN" or $job->getRole() == "CREATOR")){
                    return true;
                }
           }
           return false;
//        foreach ($schtroumpf->getSchtroumpfJobs() as $value) {
//            /** @var SchtroumpfJob $job */
//            $job = $value;
//            if ($job . $user == $user) {
//                return true;
//            }
//        }
       }

        if ($attribute == "edit_review"){
            $user = $token->getUser();
            if (!$user instanceof User) {
                // the user must be logged in; if not, deny access
                return false;
            }

            /** @var Review $review */
            $review = $subject;

            foreach ($review->getSchtroumpf()->getSchtroumpfJobs() as $job){

                if ($job->getUser() == $user and $job->getRole() == "ADMIN" ){
                    return true;
                }
            }
            return false;
//        foreach ($schtroumpf->getSchtroumpfJobs() as $value) {
//            /** @var SchtroumpfJob $job */
//            $job = $value;
//            if ($job . $user == $user) {
//                return true;
//            }
//        }
        }

        return true;

    }

    protected function supports(string $attribute, mixed $subject): bool
    {

        // if the attribute isn't one we support, return false
        if (!in_array($attribute, ["edit_review","create_review"])) {
            return false;
        }

        return true;

    }
}


const QUESTIONS = [
  "What is Autism Spectrum Disorder (ASD)?",
  "What are the common signs and symptoms of Autism?",
  "What is Applied Behavior Analysis (ABA) therapy?",
  "Are there any educational resources to help individuals and families better understand Autism and its associated traits?",
  "Local Autism Healthcare in Malaysia",
  "What are the coping strategies for people with Autism?"
];

function matchQuestion(userQuery) {
  let bestMatchIndex = -1;
  let bestMatchScore = Infinity;

  // Iterate through each question and calculate the Levenshtein distance
  // to find the best match for the user's query
  for (let i = 0; i < QUESTIONS.length; i++) {
    const question = QUESTIONS[i];
    const distance = levenshteinDistance(userQuery, question);

    if (distance < bestMatchScore) {
      bestMatchIndex = i;
      bestMatchScore = distance;
    }
  }

  // Return the best matched question or handle cases where no match is found
  return bestMatchIndex;
  // if (bestMatchIndex !== -1) {

  // } else {
  //   return "Sorry, I couldn't find a matching question.";
  // }
}

function levenshteinDistance(a, b) {
  if (a.length === 0) return b.length;
  if (b.length === 0) return a.length;

  const matrix = [];

  // Initialize the matrix with distances from 0 to the length of strings
  for (let i = 0; i <= b.length; i++) {
    matrix[i] = [i];
  }

  for (let j = 0; j <= a.length; j++) {
    matrix[0][j] = j;
  }

  // Calculate the minimum distances
  for (let i = 1; i <= b.length; i++) {
    for (let j = 1; j <= a.length; j++) {
      if (b.charAt(i - 1) === a.charAt(j - 1)) {
        matrix[i][j] = matrix[i - 1][j - 1];
      } else {
        matrix[i][j] = Math.min(
          matrix[i - 1][j - 1] + 1, // substitution
          matrix[i][j - 1] + 1, // insertion
          matrix[i - 1][j] + 1 // deletion
        );
      }
    }
  }

  return matrix[b.length][a.length];
}

function getBotResponse(input) {
  const responseData = [
    'Autism spectrum disorder (ASD) is a developmental disability caused by differences in the brain. People with ASD often have problems with social communication and interaction, and restricted or repetitive behaviors or interests. People with ASD may also have different ways of learning, moving, or paying attention.',
    'The core symptoms of autism are:<br/>a. Social Communication Challenges<br/>b. Restricted, Repetitive Behaviors',
    `Applied Behaviour Analysis (ABA) is an approach to understanding and changing behaviour. It's not a specific therapy itself, but a range of different strategies and techniques that can be used to help autistic people learn new skills and behaviour.`,
    `Certainly! Here are some educational resources specific to Malaysia that can help individuals and families better understand autism and its associated traits:<br/><br/>a. <a href="www.autismstep.com.my"><b>Autism STEP Malaysia:</b></a> Autism STEP Malaysia is an organization that offers training programs and resources for parents, educators, and professionals working with individuals with autism. They provide workshops, online courses, and consultation services. Their website offers information about their programs and resources.<br/><br/>b. <a href="www.autismnavigator.com"><b>Autism Navigator:</b></a> Autism Navigator provides free online courses and resources for families, early intervention providers, and healthcare professionals.<br/><br/>c. <a href="www.autisminternetmodules.org"><b>Autism Internet Modules:</b></a> Autism Internet Modules (AIM) is an online learning platform that provides evidence-based training modules on various topics related to autism.<br/><br/>d. <a href="www.cdc.gov/ncbddd/autism/index.html"><b>Centers for Disease Control and Prevention (CDC) Autism Information:</b></a> The CDC provides comprehensive information on autism, including factsheets, data and statistics, early signs, diagnosis, treatment options, and resources for families and healthcare providers.`,
    `Certainly! Here is some Local Autism Healthcare in Malaysia:<br/><br/>a. <a href="www.ummc.edu.my"><b>University Malaya Medical Centre (UMMC):</b></a> UMMC is a leading medical institution in Malaysia that provides a range of healthcare services, including assessment and management of autism.They have specialists in pediatric neurology, developmental pediatrics, and child psychiatry.<br/><br/>b. <a href="www.hkl.gov.my"><b>Hospital Kuala Lumpur (HKL):</b></a> HKL is a government - funded hospital that provides medical services, including assessment and intervention for autism.They have a pediatric department that may have specialists who can assist with autism - related concerns.<br/><br/>c. <a href="www.princecourt.com"><b>Prince Court Medical Centre:</b></a> Prince Court is a private hospital in Kuala Lumpur that offers comprehensive healthcare services, including autism assessment and management.They have pediatric specialists who can provide expert evaluation and guidance.`,
    `Coping strategies can be helpful for individuals with autism to manage challenges, reduce stress, and enhance overall well-being. Here are some coping strategies that can be beneficial:<br/><br/><b>a. Self-regulation techniques:</b> Engaging in activities that promote self-regulation can be helpful, such as deep breathing exercises, progressive muscle relaxation, or sensory-based activities that provide comfort and calming sensations.<br/><br/><b>b. Visual Supports:</b> Visual supports, such as visual schedules, social stories, or visual cues, can aid in understanding and following routines, managing transitions, and enhancing communication and comprehension.<br/><br/><b>c. Special Interests and Hobbies:</b> Encouraging engagement in special interests and hobbies provides a sense of enjoyment and can serve as a coping mechanism. These activities can offer a way to relax, focus, and find solace during challenging times.<br/><br/><b>d. Sensory Breaks:</b> Taking sensory breaks when feeling overwhelmed or overstimulated can be beneficial. Finding a quiet and calm space, using sensory tools like fidget toys or weighted blankets, or engaging in preferred sensory activities can help regulate sensory input.<br/><br/><b>e. Social Support Networks:</b> Building and maintaining social support networks can provide a sense of belonging, understanding, and emotional support. This can include connecting with friends, family, support groups, or online communities of individuals with autism.<br/><br/><b>f. Communication Strategies:</b> Developing and utilizing effective communication strategies can aid in expressing needs, concerns, and emotions. This can involve using visual aids, augmentative and alternative communication (AAC) systems, or practicing social scripts and role-playing.<br/><br/><b>g. Structured Routines and Predictability:</b> Establishing structured routines and maintaining a predictable environment can provide a sense of stability and reduce anxiety. Clear schedules, visual timetables, and consistent expectations can help individuals with autism navigate daily activities with less stress.<br/><br/><b>h. Mindfulness and Relaxation Techniques:</b> Practicing mindfulness exercises, meditation, or relaxation techniques can promote self-awareness, reduce stress, and enhance emotional well-being. These techniques can help individuals with autism manage anxiety or sensory overload.<br/><br/><b>i. Advocacy and Self-Advocacy:</b> Developing self-advocacy skills and advocating for one's needs and rights can empower individuals with autism. Learning about their strengths, challenges, and rights can help build self-esteem and improve self-confidence.`
  ]

  if (input == 0) {
    return "Here are some of the questions you can ask me: <br><br> 1. What is Autism Spectrum Disorder (ASD)? <br> 2. What are the common signs and symptoms of Autism? <br> 3. What is Applied Behavior Analysis (ABA) therapy? <br> 4. Are there any educational resources to help individuals and families better understand Autism and its associated traits? <br> 5. Local Autism Healthcare in Malaysia <br> 6. What are the coping strategies for people with Autism?"
  }

  const x = matchQuestion(input)
  if (x > 0 && x < 7) {
    return responseData[x] + '<br/><br/><i>Enter <b>0</b> to return to the main menu.</i>';
  } else {
    return 'Invalid input. Please enter a number between 0 and 6.';
  }
}
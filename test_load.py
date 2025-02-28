import threading
import requests
import time
from datetime import datetime

def send_request(target_url, thread_id, max_requests=10):
    """Simule une charge avec un nombre limité de requêtes"""
    count = 0
    start_time = time.time()
    
    try:
        while count < max_requests:
            response = requests.get(target_url)
            count += 1
            print(f"Thread {thread_id} - Requête {count}/{max_requests} - Status: {response.status_code}")
            time.sleep(0.5)  # Délai de 500ms entre les requêtes
    except requests.exceptions.RequestException as e:
        print(f"Erreur dans thread {thread_id}: {e}")

def main():
    # URL du serveur de test local
    target = "http://localhost/ddos-test-python/sim_ddos.php"
    thread_count = 5 # Nombre de threads raisonnable pour un test
    
    print(f"Test de charge sur: {target}")
    print("------------------------------------------")
    
    threads = []
    start_time = datetime.now()
    
    for i in range(thread_count):
        thread = threading.Thread(target=send_request, args=(target, i))
        threads.append(thread)
        thread.start()
    
    for thread in threads:
        thread.join()
    
    duration = datetime.now() - start_time
    print(f"\nTest terminé en {duration.total_seconds():.2f} secondes")
    print("Vérifiez access_logs.txt pour voir les résultats")

if __name__ == "__main__":
    main()